<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <el-button
              type="primary"
              class="mr-2"
              icon="el-icon-back"
              v-on:click="$inertia.get(route('admin.newcostumer.index'))"
              size="mini"
            >
            </el-button>
            {{ pluralText(name) + ' - #' + data.id}}
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Ad Soyad:</th>
                  <td>{{ data.user.name }}</td>
                </tr>
                <tr>
                  <th>Ürün</th>
                  <td><a href="#" target="blank">{{ data.product.title + ' - #' + data.product.id }}</a></td>
                </tr>
                <tr>
                  <th>Ürün Ücreti</th>
                  <td>{{ data.product.price }} TL</td>
                </tr>
                <tr>
                  <th>Ürün Notu</th>
                  <td>{{ data.text }}</td>
                </tr>
                <tr>
                  <th>Durum</th>
                  <td>{{ orderStatus(data.status).title }}</td>
                </tr>
                <tr>
                  <th>Eklenme Tarihi</th>
                  <td>{{ $moment(data.created_at).format('DD-MM-Y H:s') }}</td>
                </tr>
                <tr>
                  <th>Güncellenme Tarihi</th>
                  <td>{{ $moment(data.updated_at).format('DD-MM-Y H:s') }}</td>
                </tr>
                <tr>
                  <th>Seçenekler</th>
                  <td>
                    <el-button
                        type="primary"
                        icon="el-icon-d-arrow-right"
                        size="mini"
                        @click="
                        $inertia.get(route(`${routeName}.edit`, [data.id]))
                        "
                    >
                    Düzenle
                    </el-button>
                    <el-button
                        type="primary"
                        icon="el-icon-d-arrow-right"
                        size="mini"
                        @click="
                        $inertia.get(route(`${routeName}.completeView`, [data.id]))
                        "
                    >
                    Siparişi Tamamla
                    </el-button>
                  </td>
                </tr>
              </tbody>
              <tbody v-if="payment">
                <h4 class="mt-4">Ödeme Bilgileri</h4>
                <tr v-if="payment.papara_account_name">
                    <th>Papara Bilgileri:</th>
                    <td>{{ payment.papara_account_name }}</td>
                    <td>{{ payment.papara_payment_date }}</td>
                </tr>
                <tr v-if="payment.bitcoin_wallet_address">
                    <th>Bitcoin Bilgileri:</th>
                    <td>{{ payment.bitcoin_wallet_address }}</td>
                    <td>{{ payment.bitcoin_payment_date }}</td>
                </tr>
                <tr v-if="payment.bank_account_number">
                    <th>Banka Bilgileri:</th>
                    <td>{{ payment.bank_account_number }}</td>
                    <td>{{ payment.bank_payment_date }}</td>
                </tr>
              </tbody>
            </table>
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
    data: Object,
    payment: Object,
    errors: {},
  },
  data() {
    return {
      routeName: 'admin.order',
      name: 'Sipariş Detayı',
    }
  },

  methods: {
    destroy(data) {
      console.log(data)
      data._method = 'POST'
      this.$inertia.post(route('admin.contacRequest.destroy'), data, {
        onSuccess: (page) => {
          this.$message({
            type: 'success',
            message: 'İşlem başarıyla tamamlandı.',
          })
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
    confirmDelete(id) {
      this.$confirm(
        'Bu bilgi talebini silmek üzeresiniz, devam edecek misiniz?',
        'Uyarı',
        {
          confirmButtonText: 'OK',
          cancelButtonText: 'İptal',
          type: 'warning',
        },
      )
        .then(() => {
          this.$inertia.post(
            route('admin.contactRequest.destroy', id),
            {},
            {
              onSuccess: (page) => {
                this.$message({
                  type: 'success',
                  message: 'İşlem başarıyla tamamlandı.',
                })
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
            },
          )
        })
        .catch((e) => {
          this.$message({
            type: 'info',
            message: 'Silme İptal Edildi!',
          })
        })
    },
    errorsToMessage(errors) {
      let $errorBag = []
      Object.keys(errors).map(function (value, key) {
        $errorBag += errors[value] + '<br>'
      })

      return $errorBag
    },
  },
}
</script>
