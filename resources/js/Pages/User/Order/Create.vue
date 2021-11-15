<template>
  <app-layout title="Sipariş Oluşturma">
    <div class="row">
      <div class="col-sm-12 col-lg-8 col-md-8">
        <div class="card">
          <div class="card-header font-bold">
            Sipariş Oluştur
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label class="text-xl">Sipariş Notu:</label>
                <div class="pb-2" v-if="errors.text">
                  <el-alert :title="errors.text" type="error"></el-alert>
                </div>
                <vue-editor
                  v-model="form.text"
                  class="rounded"
                  :placeholder="placeholder"
                ></vue-editor>
              </div>
              <el-button
                class="float-right mt-3"
                icon="el-icon-s-order"
                type="success"
                @click="create()"
                :loading="loading"
              >
                <span v-if="loading">Sipariş Oluşturuluyor</span>
                <span v-else>Sipariş Oluştur</span>
              </el-button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-4 col-md-4">
        <div class="card mt-xs-2">
          <div class="card-header font-bold">
            Ürün
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <img class="rounded" :src="`/storage/${product.image}`" />
              </div>
              <div class="col-md-8">
                <h4 class="mt-2 mt-md-0">
                  {{ product.title }}
                </h4>
                <div
                  class="py-1 text-[#564fd0] font-bold text-2xl border-white"
                >
                  <sup class="line-through text-sm">{{ product.discount_price }} TL</sup>
                  {{
                      product.price
                  }}
                  TL
                </div>
                <p class="text-sm mt-2" v-html="product.text"></p>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div
                      class="flex items-start py-2 text-base space-x-4 border-bottom border-gray-300"
                    >
                      <div class="text-[#564fd0]">
                        <i class="fad fa-shipping-timed"></i>
                      </div>
                      <div class="font-bold">
                        Teslimat Süresi:
                      </div>
                      <div>
                        {{ product.delivery_time }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div
                      class="flex items-start py-2 text-base space-x-4 border-bottom border-gray-300"
                    >
                      <div class="text-[#564fd0]">
                        <i class="fad fa-credit-card-front"></i>
                      </div>
                      <div class="font-bold">
                        Ödeme Seçenekleri:
                      </div>
                      <div>
                        Papara, Havale ve EFT
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div
                      class="flex items-start py-2 text-base space-x-4 border-bottom border-gray-300"
                    >
                      <div class="text-[#564fd0]">
                        <i class="fad fa-user-headset"></i>
                      </div>
                      <div class="font-bold">
                        Satış Sonrası Destek:
                      </div>
                      <div>
                        Aktif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mt-2">
                    <div class="flex items-start py-2 text-base space-x-4">
                      <div>
                        <button
                          @click="whatsappOrder"
                          class="btn btn-success shadow bg-[#25D366] border-[#075E54] text-white text-base py-2"
                        >
                          <i class="fab fa-whatsapp pr-1"></i>
                          Whatsapp Sipariş Hattı
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppUserLayout'
import { Swiper, SwiperSlide } from 'swiper/vue'
import SwiperCore, { Navigation, Thumbs } from 'swiper/core'
import { VueEditor } from 'vue3-editor'

import '@/Styles/swiper.css'
import 'swiper/swiper-bundle.css'
import 'swiper/components/navigation/navigation.min.css'
import 'swiper/components/thumbs/thumbs.min.css'

SwiperCore.use([Navigation, Thumbs])

export default {
  components: {
    AppLayout,
    Swiper,
    SwiperSlide,
    VueEditor,
  },
  props: {
    product: Object,
    jetstream: Object,
  },
  data() {
    return {
      form: {
        text: null,
      },
      errors: {
        text: null,
      },
      loading: false,
      thumbsSwiper: null,
      placeholder:
        'Hesap gerektiren lisans üyeliklerinde hesap için istediğiniz mail adresinizi, \n \n Görsel için ise görsel linklerini paylaşmalısınız. \n ...',
    }
  },

  methods: {
    create() {
      if (this.form.text !== null) {
        this.$inertia.post(
          route('user.order.store'),
          {
            ...this.form,
            product: this.product.id,
          },
          {
            onStart: () => {
              this.loading = true
              this.errors.text = null
            },
            onSuccess: (page) => {
              this.$notify({
                title: 'Sipariş',
                message: this.jetstream.flash.message,
                type: 'success',
              })
              this.$inertia.get(
                route('user.order.show', [this.jetstream.flash.order]),
              )
              this.loading = false
            },
            onError: (errors) => {
              this.errors = errors
              this.loading = false
            },
          },
        )
      } else {
        this.errors.text = 'Sipariş oluşturmanız için açıklama girmelisiniz!'
      }
    },
    setThumbsSwiper(swiper) {
      this.thumbsSwiper = swiper
    },
  },
}
</script>
