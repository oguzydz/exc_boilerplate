<template>
    <app-layout>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header font-bold">
                        <el-button type="primary" class="mr-2" icon="el-icon-back"
                            v-on:click="$inertia.get(route('admin.category.index'))" size="mini">
                            Kategori Listesi</el-button> Kategori Oluştur
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-2">
                                <label>Başlık</label>
                                <el-input placeholder="Stock Görselleri" v-model="form.title"></el-input>
                            </div>
                            <div class="form-group mb-2">
                                <label>Açıklama</label>
                                <vue-editor v-model="form.text"></vue-editor>
                            </div>
                            <div class="form-group mb-2">
                                <label>Görsel</label>
                                <file-pond v-model="form.image" ref="pond"
                                    label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile" :captureMethod="null"/>
                            </div>
                            <div class="form-group mb-2">
                                <label>Görsel SEO İsim</label>
                                <el-input placeholder="Harika Stok Görselleri" v-model="form.image_seo"></el-input>
                            </div>
                            <div class="form-group mb-2">
                                <label>Slug</label>
                                <el-input placeholder="Harika Stok Görselleri veya harika-stok-gorselleri"
                                    v-model="form.slug"></el-input>
                            </div>
                            <div class="form-group mb-2">
                                <label class="w-full">Status</label>
                                <el-switch v-model="status" active-color="#13ce66" inactive-color="#ff4949"
                                    active-text="Aktif" inactive-text="Pasif"></el-switch>
                            </div>
                            <div class="form-group mb-2">
                                <label class="w-full">Sırası</label>
                                <el-input-number v-model="form.order" :min="0"></el-input-number>
                            </div>
                            <button class="btn btn-success text-white float-right mt-2" @click="create(form)"
                                type="button">
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
        features: {},
        errors: {}
    },


    data() {
        return {
            form: {
                title: null,
                text: null,
                image: null,
                image_seo: null,
                category_id: null,
                order: null,
            },
            status: true
        }
    },

    watch: {
        status: function (val) {
            this.setStatus(val)
        },
    },

    created() {

    },


    methods: {

        setStatus(status) {
            this.status = this.booleanStatus(status)
        },

        onAddFile(error, file) {
            if (error) {
                this.$message({
                    type: 'error',
                    dangerouslyUseHTMLString: true,
                    message: 'Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!',
                })
            }

            this.form.new_image = file.source;
        },

        create(data) {
            data._method = 'POST';
            data.status = this.booleanStatus(this.status)
            this.$inertia.post(route('admin.category.store'), data, {
                onSuccess: page => {
                    this.$message({
                        type: 'success',
                        message: 'İşlem başarıyla tamamlandı.',
                    })
                    this.$inertia.get(route('admin.category.index'))
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
