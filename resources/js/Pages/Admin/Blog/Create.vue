<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header font-bold">
            <el-button
              type="primary"
              class="mr-2"
              icon="el-icon-back"
              v-on:click="$inertia.get(route('admin.blog.index'))"
              size="mini"
            >
              Bloglar
            </el-button>
            Blog Oluştur
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label>Başlık</label>
                <input type="text" class="form-control" v-model="form.title" />
              </div>
              <div class="form-group mb-2">
                <label>Yazı</label>
                <vue-editor v-model="form.text"></vue-editor>
              </div>
              <div class="form-group mb-2">
                <label>Görsel (370x220)</label>
                <file-pond
                  v-model="form.image"
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
                  v-model="form.image_seo"
                />
              </div>
              <button
                class="btn btn-success text-white float-right mt-2"
                @click="create(form)"
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
import { VueEditor } from 'vue3-editor'
import vueFilePond from 'vue-filepond'
import 'filepond/dist/filepond.min.css'

const FilePond = vueFilePond()

export default {
  components: {
    AppLayout,
    FilePond,
    VueEditor,
  },
  props: {
    office: {},
    errors: {},
    blog: []
  },
  mounted() {},
  data() {
    return {
      form: {
        title: null,
        text: null,
        image: null,
        image_seo: null,
      },
    }
  },

  methods: {
    onAddFile(error, file) {
      this.form.image = file.source
    },

    create(data) {
      data._method = 'POST'

      this.$inertia.post(route('admin.blog.store'), data, {
        onSuccess: (page) => {
          this.$message({
            type: 'success',
            message: 'İşlem başarıyla tamamlandı.',
          })
          this.$inertia.get(route('admin.blog.index'))
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
