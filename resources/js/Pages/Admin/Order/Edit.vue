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
              @click="$inertia.get(route('admin.order.show', [data.id]))"
              size="mini"
            >
              Siparişe Dön
            </el-button>
            Sipariş Düzenleme #{{ data.id }}
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label>Sipariş Durumu</label>
                <el-select
                  v-model="data.status"
                  style="width: 100%;"
                  placeholder="Ürün Durumu Seç"
                >
                  <el-option
                    v-for="(status, statusIndex) in statusList"
                    :key="statusIndex"
                    :label="status"
                    :value="statusIndex"
                  ></el-option>
                </el-select>
              </div>
              <el-button
                class="float-right"
                icon="el-icon-edit"
                type="success"
                @click="update(data)"
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

import vueFilePond from 'vue-filepond'
import 'filepond/dist/filepond.min.css'
import { VueEditor } from 'vue3-editor'

const FilePond = vueFilePond()

export default {
  components: {
    AppLayout,
    FilePond,
    VueEditor,
  },
  props: {
    statusList: Array,
    data: Object,
    errors: Object,
  },

  data() {
    return {
      loading: false,
    }
  },

  methods: {
    onAddFile(error, file) {
      if (error) {
        this.$message({
          type: 'error',
          dangerouslyUseHTMLString: true,
          message:
            'Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!',
        })
      }

      this.form.new_image = file.source
    },

    update(data) {
      this.$inertia.post(route('admin.order.update', [data.id]), data, {
        onStart: () => (this.loading = true),
        onSuccess: (page) => {
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
