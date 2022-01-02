<template>
  <app-layout title="Kayıt Ekranı">
    <page-title :title="title" />
    <div class="row">
      <div class="col-md-12">
        <el-steps
          :active="active"
          finish-status="success"
          simple
          style="margin-top: 20px"
        >
          <el-step title="Üyelik Bilgileri"></el-step>
          <el-step title="Banka Hesabı"></el-step>
          <el-step title="Mağaza Bilgiler"></el-step>
          <el-step title="Sonuç Ekranı"></el-step>
        </el-steps>
      </div>
      <div class="col-md-12">
        <div class="step-tab-content">
          <div class="row" v-if="active === 0 && userStatus !== 4">
            <div class="col-md-6 form-info-side">
              <el-alert
                v-if="userStatus === 5"
                title="Başvurunuz Rededildi:"
                type="error"
                show-icon
                class="mb-4 mt-xs-3"
              >
                <span v-html="userCancel.text"></span>
              </el-alert>
              <div class="form-info text-center">
                <h3>Üyelik Bilgileriniz</h3>
                <p class="text-information">
                  Exxefy hesabınızı ücretsiz olarak sadece birkaç dakika
                  içerisinde oluşturabilirsiniz. Lütfen istenilen bilgileri
                  girerek "İlerle" butonuna tıklayınız.
                </p>
                <img src="/assets/img/we-provide/check-1.png" class="img" />
              </div>
            </div>
            <div class="col-md-6">
              <el-form
                :model="firstForm"
                :rules="rules"
                ref="firstForm"
                label-width="130px"
                :label-position="isMobile() ? 'left' : 'right'"
                size="medium"
              >
                <el-form-item label="Üyelik Tipi:" prop="membership_type">
                  <el-select
                    v-model="firstForm.membership_type"
                    placeholder="Üyelik tipiniz."
                  >
                    <el-option
                      v-for="(userType, index) in userTypes"
                      :label="userType.name"
                      :value="userType.id"
                      :key="index"
                    ></el-option>
                  </el-select>
                </el-form-item>
                <el-form-item label="Ad-Soyad:" prop="name">
                  <el-input
                    v-model="firstForm.name"
                    placeholder="Adınızı ve soyadınız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="T.C. Numarası:" prop="tc">
                  <el-input
                    v-model="firstForm.tc"
                    type="number"
                    maxlength="11"
                    placeholder="T.C. kimlik numaranız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="Doğum Tarihi:" required>
                  <el-form-item prop="born_date">
                    <el-date-picker
                      type="date"
                      placeholder="Doğum tarihiniz."
                      v-model="firstForm.born_date"
                      style="width: 100%"
                    ></el-date-picker>
                  </el-form-item>
                </el-form-item>
                <el-form-item label="Telefon Numarası:" prop="phone">
                  <el-input
                    v-model="firstForm.phone"
                    type="number"
                    maxlength="11"
                    placeholder="Cep telefonu numaranız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="Adres:" prop="address">
                  <el-input
                    type="textarea"
                    v-model="firstForm.address"
                    placeholder="Açık adresiniz."
                  ></el-input>
                </el-form-item>
                <el-form-item label="İl - İlçe:" required>
                  <el-col :span="11">
                    <el-form-item prop="city_id">
                      <el-select
                        v-model="firstForm.city_id"
                        placeholder="İl seçiniz."
                        @change="getCounties"
                      >
                        <el-option
                          v-for="(city, index) in cities"
                          :label="city.city"
                          :value="city.id"
                          :key="index"
                        ></el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                  <el-col class="line" :span="2">
                    &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                  </el-col>
                  <el-col :span="11">
                    <el-form-item prop="county_id">
                      <el-select
                        v-model="firstForm.county_id"
                        placeholder="İlçe seçiniz."
                      >
                        <el-option
                          v-for="(county, index) in counties"
                          :label="county.county"
                          :value="county.id"
                          :key="index"
                        ></el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                </el-form-item>

                <div class="float-right">
                  <el-button
                    type="info"
                    icon="el-icon-edit"
                    @click="back('secondForm')"
                    >Geri</el-button
                  >
                  <el-button
                    type="success"
                    icon="el-icon-check"
                    @click="submitForm('firstForm')"
                    >İLERLE</el-button
                  >
                </div>
              </el-form>
            </div>
          </div>
          <div class="row" v-if="active === 1 && userStatus !== 4">
            <div class="col-md-6 text-center form-info-side">
              <div class="form-info">
                <h3>Banka Hesabınız</h3>
                <p class="text-information">
                  Yaptığınız satışlarla ilgili ödemelerinizin banka hesabınıza
                  transfer edilebilmesi için lütfen gerekli bilgileri giriniz.
                </p>
                <img src="/assets/img/we-provide/check-1.png" class="img" />
              </div>
            </div>
            <div class="col-md-6">
              <el-alert
                title="Bilgi:"
                type="info"
                description="Para gönderimleri, Exxefy’a kayıtlı kişi adına IBAN bilgisi ile yapılmaktadır."
                show-icon
                class="mb-3"
              >
              </el-alert>

              <el-form
                :model="secondForm"
                :rules="secondRules"
                ref="secondForm"
                label-width="130px"
                :label-position="isMobile() ? 'left' : 'right'"
                size="medium"
              >
                <el-form-item label="IBAN:" prop="iban">
                  <el-input
                    v-model="secondForm.iban"
                    type="number"
                    maxlength="24"
                    placeholder="Iban, TL hesabınız."
                  ></el-input>
                </el-form-item>
                <div class="float-right">
                  <el-button type="info" icon="el-icon-edit" @click="back()"
                    >Geri</el-button
                  >
                  <el-button
                    type="success"
                    icon="el-icon-check"
                    @click="submitForm('secondForm')"
                    >İLERLE</el-button
                  >
                </div>
              </el-form>
            </div>
          </div>
          <div class="row" v-if="active === 2 && userStatus !== 4">
            <div class="col-md-6 text-center form-info-side">
              <div class="form-info">
                <h3>Satılan Ürün</h3>
                <p class="text-information">
                  Satış yaptığınız ürünler veya hizmetlerin detayları ile
                  birlikte internet üzerinde satış amaçlı oluşturduğunuz
                  sayfalarınızı veya hesaplarınızı belirtiniz.
                </p>
                <img src="/assets/img/we-provide/check-1.png" class="img" />
              </div>
            </div>
            <div class="col-md-6">
              <el-alert
                title="Bilgi:"
                type="info"
                description="Exxefy’da ne tür ürünlerin veya hizmetlerin satışını yapmayı planlıyorsunuz?"
                show-icon
                class="mb-3"
              >
              </el-alert>

              <el-form
                :model="fourthForm"
                :rules="fourthRules"
                ref="fourthForm"
                label-width="130px"
                :label-position="isMobile() ? 'left' : 'right'"
                size="medium"
              >
                <el-form-item label="Mağaza Adı:" prop="title">
                  <el-input
                    v-model="fourthForm.title"
                    placeholder="Mağaza adınız."
                  ></el-input>
                </el-form-item>

                <el-form-item label="Mağaza Açıklama:" prop="text">
                  <el-input
                    type="textarea"
                    v-model="fourthForm.text"
                    rows="4"
                    placeholder="Sitede görünecek mağaza açıklamanız."
                  ></el-input>
                </el-form-item>
              </el-form>

              <el-form
                :model="thirdForm"
                :rules="thirdRules"
                ref="thirdForm"
                label-width="130px"
                :label-position="isMobile() ? 'left' : 'right'"
                size="medium"
              >
                <el-form-item label="Ürün Özeti:" prop="service_text">
                  <el-input
                    type="textarea"
                    v-model="thirdForm.service_text"
                    rows="4"
                    placeholder="Satılan ürün veya hizmet hakkında bilgi."
                  ></el-input>
                </el-form-item>
                <div class="float-right">
                  <el-button type="info" icon="el-icon-edit" @click="back()"
                    >Geri</el-button
                  >
                  <el-button
                    type="success"
                    icon="el-icon-check"
                    @click="submitForm('thirdForm')"
                    >GÖNDER</el-button
                  >
                </div>
              </el-form>
            </div>
          </div>
          <div class="row" v-if="active === 3 || active === 4 || userStatus === 4">
            <div class="col-md-6 text-center form-info-side">
              <div class="form-info">
                <h3>BAŞVURUNUZ TAMAMLANDI!</h3>
                <p class="text-information">
                  Exxefy giriş başvurunuz başarıyla tamamlandı! Ücretsiz satışa
                  başlamadan önce sizi hesabınız onaylanana kadar biraz
                  beklemeye davet ediyoruz.
                </p>
                <img src="/assets/img/we-provide/check-2.png" class="img" />
              </div>
            </div>
            <div class="col-md-6">
              <el-alert
                title="Başvuru Özeti:"
                type="success"
                description="Başvurunuz başarıyla tamamlandı, ekibimizin incelemesinden sonra hemen satış yapmaya başlayabilirsiniz."
                show-icon
                class="mb-2 mt-xs-3"
              >
              </el-alert>

              <el-alert
                title="Onay Süresi:"
                type="info"
                description="En geç 1 iş günü içerisinde başvurunuz sonuçlanacaktır. Aklınıza takılan bir soru olursa canlı destek üzerinden yardım alabilirsiniz."
                show-icon
                class="mb-2"
              >
              </el-alert>
              <el-alert
                title="Bilgi:"
                type="info"
                description="Başvurunuz onaylanana kadar Exxefy'ın tüm özelliklerine erişemeyeceksiniz."
                show-icon
                class="mb-2"
              >
              </el-alert>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppUserLayout";
import PageTitle from "@/Components/User/PageTitle";

export default {
  components: {
    AppLayout,
    PageTitle,
  },
  props: {
    userStatus: Number,
    userTypes: Object,
    cities: Object,
    toast_success: String,
    firstForm: Object,
    secondForm: Object,
    thirdForm: Object,
    fourthForm: Object,
    userCancel: Object,
  },
  data() {
    return {
      stabilActive: this.userStatus != 0 ? true : false,
      active: this.userStatus == 4 ? 4 : 0,
      title: "ÜCRETSİZ HESAP OLUŞTURUN",
      rules: {
        name: [
          {
            required: true,
            message: "Lütfen ad-soyad alanını doldurunuz.",
            trigger: "blur",
          },
          {
            min: 3,
            max: 40,
            message: "En küçük 3, en fazla 40 karakter olabilir.",
            trigger: "blur",
          },
        ],
        membership_type: [
          {
            required: true,
            message: "Lütfen üyelik tipinizi seçiniz.",
            trigger: "change",
          },
        ],
        tc: [
          {
            required: true,
            message: "Lütfen TCKN giriniz.",
            trigger: "blur",
          },
          {
            min: 11,
            max: 11,
            message: "TCKN 11 haneli olmalı",
            trigger: "blur",
          },
        ],
        born_date: [
          {
            type: "date",
            required: true,
            message: "Lütfen doğum tarihi giriniz.",
            trigger: "change",
          },
        ],
        phone: [
          {
            required: true,
            message: "Lütfen telefon numaranızı giriniz.",
            trigger: "blur",
          },
          {
            min: 11,
            max: 11,
            message: "Numaranız 11 haneli olmalı, Örnek: 05394964002",
            trigger: "blur",
          },
        ],
        address: [
          {
            required: true,
            message: "Lütfen adresinizi giriniz.",
            trigger: "blur",
          },
        ],
        city_id: [
          {
            required: true,
            message: "Lütfen ilinizi seçiniz.",
            trigger: "change",
          },
        ],
        county_id: [
          {
            required: true,
            message: "Lütfen ilçenizi seçiniz.",
            trigger: "change",
          },
        ],
      },
      secondRules: {
        iban: [
          {
            required: true,
            message: "Lütfen iban giriniz.",
            trigger: "blur",
          },
          {
            min: 24,
            max: 24,
            message: "Iban 24 haneli olmalı",
            trigger: "blur",
          },
        ],
      },
      thirdRules: {
        service_text: [
          {
            required: true,
            message: "Lütfen özet giriniz.",
            trigger: "blur",
          },
        ],
      },
      fourthRules: {
        title: [
          {
            required: true,
            message: "Lütfen mağaza adı giriniz.",
            trigger: "blur",
          },
        ],
        text: [
          {
            required: true,
            message: "Lütfen mağaza açıklaması giriniz.",
            trigger: "blur",
          },
        ],
      },
      counties: Object,
      fullForm: Object,
    };
  },

  methods: {
    next() {
      if (this.active++ > 2) this.active = 0;
    },

    back() {
      if (this.active-- < 1) this.active = 0;
    },

    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          if (formName == "thirdForm") {
            this.fullForm = Object.assign(
              {},
              this.firstForm,
              this.secondForm,
              this.thirdForm,
              this.fourthForm,
            );

            this.$inertia.post(
              route("user.confirmation.store"),
              this.fullForm,
              {
                onSuccess: (page) => {
                  console.log(page);
                  this.$message({
                    type: "success",
                    message: "İşlem başarıyla tamamlandı.",
                  });
                  this.active = 4;
                },
                onError: (errors) => {
                  this.$message({
                    type: "error",
                    dangerouslyUseHTMLString: true,
                    message:
                      "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                      this.errorsToMessage(errors),
                  });
                },
              }
            );
          } else {
            if (this.active++ > 2) this.active = 0;
          }
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },

    resetForm(formName) {
      this.$refs[formName].resetFields();
    },

    getCounties() {
      axios
        .get(route("api.cityCounties", [this.firstForm.city_id]))
        .then((response) => {
          this.counties = response.data;
        });
    },

    isMobile() {
      if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
          navigator.userAgent
        )
      ) {
        return true;
      } else {
        return false;
      }
    },
  },
};
</script>

<style>
.el-step.is-simple .el-step__title {
  font-size: 12px;
  line-height: 14px;
}
.el-steps--simple {
  background: #ffffff;
  box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);
}
.step-tab-content {
  background: white;
  margin-top: 20px;
  padding: 35px;
  box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);
}
.text-information {
  font-size: 14px;
  color: gray;
}
.el-form-item__label {
  font-size: 13px;
}
.el-button [class*="el-icon-"] + span {
  font-weight: bold;
}
@media screen and (min-width: 768px) {
  .form-info-side {
    border-right-width: 1px;
    border-style: dashed;
  }
}
@media screen and (max-width: 768px) {
  .el-step.is-simple:not(:last-of-type) .el-step__title {
    word-break: unset !important;
  }
  .el-step__arrow {
    display: none !important;
  }
  .el-step.is-simple .el-step__title {
    font-size: 10px;
    line-height: 12px;
  }
}
</style>
