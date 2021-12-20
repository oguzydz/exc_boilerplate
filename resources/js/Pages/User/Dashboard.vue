<template>
  <app-layout title="Stok Görselleri">
    <page-title :title="title" />
    <div class="row">
      <div class="col-md-12">
        <el-steps
          :active="active"
          finish-status="success"
          simple
          style="margin-top: 20px"
        >
          <div class="col-md-3">
            <el-step title="Üyelik Bilgileri"></el-step>
          </div>
          <div class="col-md-3">
            <el-step title="Banka Hesabı"></el-step>
          </div>
          <div class="col-md-3">
            <el-step title="Satılan Ürün"></el-step>
          </div>
          <div class="col-md-3">
            <el-step title="Tamamla"></el-step>
          </div>
        </el-steps>
      </div>
      <div class="col-md-12">
        <div class="step-tab-content">
          <div class="row" v-if="active === 0">
            <div class="col-md-6 text-center m-auto">
              <div class="form-info">
                <h3>Üyelik Bilgileriniz</h3>
                <p class="text-information">
                  Shopier hesabınızı ücretsiz olarak sadece birkaç dakika
                  içerisinde oluşturabilirsiniz. Lütfen istenilen bilgileri
                  girerek "İlerle" butonuna tıklayınız.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <el-form
                :model="firstForm"
                :rules="rules"
                ref="firstForm"
                label-width="130px"
                label-position="right"
                size="medium"
              >
                <el-form-item label="Üyelik Tipi" prop="user_type">
                  <el-select
                    v-model="firstForm.user_type"
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
                <el-form-item label="Ad-Soyad" prop="name">
                  <el-input
                    v-model="firstForm.name"
                    placeholder="Adınızı ve soyadınız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="T.C. Numarası" prop="tc">
                  <el-input
                    v-model="firstForm.tc"
                    type="number"
                    placeholder="T.C. kimlik numaranız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="Doğum Tarihi" required>
                  <el-form-item prop="born_date">
                    <el-date-picker
                      type="date"
                      placeholder="Doğum tarihiniz."
                      v-model="firstForm.born_date"
                      style="width: 100%"
                    ></el-date-picker>
                  </el-form-item>
                </el-form-item>
                <el-form-item label="Telefon Numarası" prop="phone">
                  <el-input
                    v-model="firstForm.phone"
                    type="number"
                    placeholder="Cep telefonu numaranız."
                  ></el-input>
                </el-form-item>
                <el-form-item label="Adres" prop="address">
                  <el-input
                    type="textarea"
                    v-model="firstForm.address"
                    placeholder="Açık adresiniz."
                  ></el-input>
                </el-form-item>
                <el-form-item label="İl - İlçe" required>
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

                <el-form-item class="float-right">
                  <el-button type="info" icon="el-icon-edit" @click="back('secondForm')"
                    >Geri</el-button
                  >
                  <el-button type="success" icon="el-icon-check" @click="submitForm('firstForm')"
                    >İLERLE</el-button
                  >
                </el-form-item>
              </el-form>
            </div>
          </div>
          <div class="row" v-if="active === 1">
            <div class="col-md-6 text-center m-auto">
              <div class="form-info">
                <h3>Banka Hesabınız</h3>
                <p class="text-information">
                  Yaptığınız satışlarla ilgili ödemelerinizin banka hesabınıza
                  transfer edilebilmesi için lütfen gerekli bilgileri giriniz.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <el-form
                :model="secondForm"
                :rules="secondRules"
                ref="secondForm"
                label-width="130px"
                label-position="right"
                size="medium"
              >
                <el-form-item label="IBAN" prop="iban">
                  <el-input
                    v-model="secondForm.iban"
                    type="number"
                    placeholder="T.C. kimlik numaranız."
                  ></el-input>
                </el-form-item>

                <el-form-item>
                  <el-button type="info" @click="back('secondForm')"
                    >Geri</el-button
                  >
                  <el-button type="success" @click="submitForm('secondForm')"
                    >İlerle</el-button
                  >
                </el-form-item>
              </el-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<style>
.el-step.is-simple .el-step__title {
  font-size: 12px;
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
.el-button [class*=el-icon-]+span {
    font-weight: bold;
}
</style>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import PageTitle from "@/Components/User/PageTitle";

export default {
  components: {
    AppLayout,
    PageTitle,
  },
  props: {
    userTypes: Object,
    cities: Object,
  },
  data() {
    return {
      active: 0,
      title: "ÜCRETSİZ HESAP OLUŞTURUN",
      firstForm: {
        user_type: "",
        name: "",
        tc: "",
        born_date: "",
        phone: "",
        address: "",
        city_id: "",
        county_id: "",
        county_id: "",
      },
      secondForm: {
        iban: "",
      },
      thirdForm: {
        user: "",
      },
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
        user_type: [
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
            min: 10,
            max: 10,
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
        user_type: [
          {
            required: true,
            message: "Lütfen üyelik tipinizi seçiniz.",
            trigger: "change",
          },
        ],
      },
      counties: Object,
    };
  },

  methods: {
    next() {
      if (this.active++ > 2) this.active = 0;
    },
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          if (this.active++ > 2) this.active = 0;
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
  },
};
</script>
