<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Ödeme Ayarları
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <h3>Papara</h3>
                <hr />
              </div>
              <div class="form-group mb-2">
                <label>Papara Hesap Adı</label>
                <el-input
                  type="text"
                  placeholder="YUNUS EMRE ÖZTÜRK"
                  v-model="paymentSetting.papara_account_name"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Papara Hesap Numarası</label>
                <el-input
                  type="number"
                  placeholder="1026964819"
                  v-model="paymentSetting.papara_account_number"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <h3>Banka</h3>
                <hr />
              </div>
              <div class="form-group mb-2">
                <label>Banka Hesap Adı</label>
                <el-input
                  type="text"
                  placeholder="YUNUS EMRE ÖZTÜRK"
                  v-model="paymentSetting.bank_account_name"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Bank IBAN Numarası</label>
                <el-input
                  type="text"
                  placeholder="TR68 0011 1000 0000 0097 6751 80"
                  v-model="paymentSetting.bank_account_iban"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <h3>Whatsapp</h3>
                <hr />
              </div>
              <div class="form-group mb-2">
                <label>Sipariş Hattı</label>
                <el-input
                  type="text"
                  placeholder="+905074221384"
                  v-model="paymentSetting.whatsapp"
                ></el-input>
              </div>
              <el-button
                class="float-right"
                icon="el-icon-edit"
                type="success"
                @click="update(paymentSetting)"
                :loading="loading"
              >
                Güncelle
              </el-button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppAdminLayout'
export default {
  components: {
    AppLayout,
  },
  props: {
    paymentSetting: Object,
  },

  data() {
    return {
      loading: false,
    }
  },

  methods: {
    update(data) {
      this.$inertia.post(route('admin.payment-setting.update'), data, {
        onStart: () => this.loading = true,
        onSuccess: () => {
          this.$message({
            type: 'success',
            message: 'İşlem başarıyla tamamlandı.',
          })
          this.loading = false
        },
        onError: (errors) => {
          this.$message({
            type: 'error',
            dangerouslyUseHTMLString: true,
            message:
              'Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>' +
              this.errorsToMessage(errors),
          })
        },
      })
    },
  },
}
</script>
