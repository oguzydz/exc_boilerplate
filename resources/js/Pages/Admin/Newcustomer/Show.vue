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
              v-on:click="$inertia.get(route(`${routeName}.index`))"
              size="mini"
            >
            </el-button>
            {{ pluralText(name) + ' - #' + data.id}}
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Ad-Soyad:</th>
                  <td>{{ data.name }}</td>
                </tr>
                <tr>
                  <th>E-Posta:</th>
                  <td>{{ data.email }}</td>
                </tr>
                <tr>
                  <th>Telefon</th>
                  <td>{{ data.phone }}</td>
                </tr>
                <tr>
                  <th>T.C.</th>
                  <td>{{ data.tc }}</td>
                </tr>
                <tr>
                  <th>Doğum Tarihi</th>
                  <td>{{ $moment(data.born_date).format('DD-MM-Y') }}</td>
                </tr>
                <tr>
                  <th>Şehir</th>
                  <td>{{ data.city_id }}</td>
                </tr>
                <tr>
                  <th>İlçe</th>
                  <td>{{ data.county_id }}</td>
                </tr>
                <tr>
                  <th>Adres</th>
                  <td>{{ data.address }}</td>
                </tr>
                <tr>
                  <th>Üyelik Durumu</th>
                  <td>{{ userStatus(data.status).title }}</td>
                </tr>
                <tr>
                  <th>İban</th>
                  <td>{{ data.iban.iban }}</td>
                </tr>
                <tr>
                  <th>Hizmet Yazısı</th>
                  <td>{{ data.confirm_data.service_text }}</td>
                </tr>
                <tr>
                  <th>Kayıt Tarihi</th>
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
                        $inertia.get(route(`${routeName}.confirm`, [data.id]))
                        "
                    >
                    Kaydı Onayla
                    </el-button>
                    <el-button
                        type="primary"
                        icon="el-icon-d-arrow-right"
                        size="mini"
                        @click="
                        $inertia.get(route(`${routeName}.cancelShow`, [data.id]))
                        "
                    >
                    Reddet
                    </el-button>
                  </td>
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
    errors: {},
  },
  data() {
    return {
      routeName: 'admin.newcustomer',
      name: 'Yeni Müşteri Detay',
    }
  },

  methods: {
    destroy(data) {
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
