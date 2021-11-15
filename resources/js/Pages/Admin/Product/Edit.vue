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
              @click="$inertia.get(route('admin.product.index'))"
              size="mini"
            >
              Ürün Listesi
            </el-button>
            Ürün Düzenle #{{ data.id }}
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label>Başlık</label>
                <el-input
                  placeholder="4'lü Paket Görsel"
                  v-model="data.title"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Açıklama</label>
                <vue-editor v-model="data.text"></vue-editor>
              </div>
              <div class="form-group mb-2">
                <label>Görsel</label>
                <file-pond
                  v-model="data.image"
                  ref="pond"
                  label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                  :allow-multiple="false"
                  @addfile="onAddFile"
                />
              </div>
              <div class="form-group mb-2">
                <label>Görsel SEO İsim</label>
                <el-input
                  placeholder="Stock 4'lü Paket Görseli"
                  v-model="data.image_seo"
                ></el-input>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Satış Fiyatı</label>
                  <el-input placeholder="19.99" v-model="data.price"></el-input>
                </div>
                <div class="col-md-6">
                  <label>İndirim Yapılacak Miktar</label>
                  <el-input
                    placeholder="10"
                    v-model="data.discount_price"
                  ></el-input>
                </div>
                <div class="col-md-12">
                  <label>En Çok Satan (0,1)</label>
                  <el-input
                    placeholder="10"
                    v-model="data.best_seller"
                  ></el-input>
                </div>
              </div>
              <div class="form-group mb-2">
                <label>Teslimat Süresi</label>
                <el-input
                  placeholder="1 gün"
                  v-model="data.delivery_time"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Slug</label>
                <el-input
                  placeholder="4'lü Paket Görsel Ürünü veya 4lu-paket-gorsel-urunu"
                  v-model="data.slug"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Kategori Seçimi</label>
                <el-select
                  v-model="data.category_id"
                  style="width: 100%;"
                  placeholder="Ürün kategorisi seç"
                >
                  <el-option
                    v-for="category in categories"
                    :key="category.id"
                    :label="category.title"
                    :value="category.id"
                  ></el-option>
                </el-select>
              </div>
              <div class="form-group mb-2">
                <label class="w-full">Sırası</label>
                <el-input-number
                  v-model="data.order"
                  :min="0"
                ></el-input-number>
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
    categories: Object,
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

      this.data.new_image = file.source
    },

    update(data) {
      this.$inertia.post(route('admin.product.update', [data.id]), data, {
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
