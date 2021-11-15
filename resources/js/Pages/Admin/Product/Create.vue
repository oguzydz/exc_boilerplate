<template>
<app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-bold">
                    <el-button type="primary" class="mr-2" icon="el-icon-back" v-on:click="$inertia.get(route('admin.product.index'))" size="mini">
                        Ürün Listesi
                    </el-button>

                    Ürün Oluştur
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-2">
                            <label>Başlık</label>
                            <el-input placeholder="4'lü Paket Görsel" v-model="form.title"></el-input>
                        </div>
                        <div class="form-group mb-2">
                            <label>Açıklama</label>
                            <vue-editor v-model="form.text"></vue-editor>
                        </div>
                        <div class="form-group mb-2">
                            <label>Görsel</label>
                            <file-pond v-model="form.image" ref="pond" label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>" :allow-multiple="false" accepted-file-types="image/jpeg, image/png" v-bind:files="myFiles" @processfile="onProcessFile" @addfile="onAddFile" />
                        </div>
                        <div class="form-group mb-2">
                            <label>Görsel SEO İsim</label>
                            <el-input placeholder="Stock 4'lü Paket Görseli" v-model="form.image_seo"></el-input>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Satış Fiyatı</label>
                                <el-input type="number" placeholder="19.99" v-model="form.price"></el-input>
                            </div>
                            <div class="col-md-6">
                                <label>İndirim Yapılacak Miktar</label>
                                <el-input type="number" placeholder="10" v-model="form.discount_price"></el-input>
                            </div>
                            <div class="col-md-12">
                                <label>En Çok Satan(0,1)</label>
                                <el-input type="number" placeholder="0" v-model="form.best_seller"></el-input>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Teslimat Süresi</label>
                            <el-input placeholder="1 gün" v-model="form.delivery_time"></el-input>
                        </div>
                        <div class="form-group mb-2">
                            <label>Slug</label>
                            <el-input placeholder="4'lü Paket Görsel Ürünü veya 4lu-paket-gorsel-urunu" v-model="form.slug"></el-input>
                        </div>
                        <div class="form-group mb-2">
                            <label>Kategori Seçimi</label>
                            <el-select
                                v-model="form.category_id"
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
                            <el-input-number v-model="form.order" :min="0"></el-input-number>
                        </div>
                        <button class="btn btn-success text-white float-right mt-2" @click="create(form)" type="button">
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
        categories: {},
        errors: {}
    },
    data() {
        return {
            form: {
                title: null,
                text: null,
                slug: null,
                price: null,
                discount_price: null,
                best_seller: null,
                delivery_time: null,
                status: 1,
                image: null,
                image_seo: null,
                category_id: null,
                order: null,
            },
        }
    },

    methods: {
        onAddFile(error, file) {

            if(error) {
                this.$message({
                    type: 'error',
                    dangerouslyUseHTMLString: true,
                    message: 'Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!',
                })
            }

            this.form.image = file.source;

        },

        create(data) {
            data._method = 'POST';
            this.$inertia.post(route('admin.product.store'), data, {
                onSuccess: page => {
                    this.$message({
                        type: 'success',
                        message: 'İşlem başarıyla tamamlandı.',
                    })
                    this.$inertia.get(route('admin.product.index'))
                },
                onError: errors => {
                    this.$message({
                        type: 'error',
                        dangerouslyUseHTMLString: true,
                        message: 'Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>' + this.errorsToMessage(errors),
                    })
                },
            })
        },
    },
}
</script>
