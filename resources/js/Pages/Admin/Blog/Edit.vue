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
              v-on:click="$inertia.get(route('admin.blog.index'))"
              size="mini"
            >
              Tüm Bloglar
            </el-button>
            Blog'u Düzenle #{{ data.id }}


          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label>Başlık</label>
                <input type="text" class="form-control" v-model="data.title" />
              </div>
              <div class="form-group mb-2">
                <label>Yazı</label>
                <vue-editor v-model="data.text"></vue-editor>
              </div>
              <div class="form-group mb-2">
                <label>Görsel (370x220)</label>
                <file-pond
                  v-model="data.image"
                  ref="pond"
                  label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                  :allow-multiple="false"
                  :accepted-file-types="['image/jpeg', 'image/png']"
                  @addfile="onAddFile"
                />
              </div>
              <div class="form-group mb-2">
                <label>Görsel SEO İsim</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="data.image_seo"
                />
              </div>
              <button
                class="btn btn-success text-white float-right mt-2"
                @click="update(data)"
                type="button"
              >
                Kaydet
              </button>
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
    data: {},
    errors: {},
  },

  methods: {
    onAddFile(error, file) {
      this.data.new_image = file.source
    },

    update(data) {
      console.log(data)
      data._method = 'POST'
      this.$inertia.post(route('admin.blog.update'), data, {
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
