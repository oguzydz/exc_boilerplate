<template>
<app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-bold">
                    <el-button type="primary" class="mr-2" icon="el-icon-back" v-on:click="$inertia.get(route('admin.product.feature.index', { id: id }))" size="mini">
                        Ürün Özelliklerini Görüntüle</el-button> Ürün Özelliği Ekle
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-2">
                            <label>Başlık</label>
                            <input type="text" class="form-control" v-model="form.title" />
                        </div>
                        <div class="form-group mb-2">
                            <label>Text</label>
                            <textarea class="form-control" rows="2" v-model="form.text"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>Sırası</label>
                            <input type="number" class="form-control" v-model="form.order" />
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
import AppLayout from "@/Layouts/AppAdminLayout";

import vueFilePond from 'vue-filepond'
import 'filepond/dist/filepond.min.css'

const FilePond = vueFilePond()

export default {
    components: {
        AppLayout,
        FilePond
    },
    props: {
        errors: {},
        id: Number,
    },
    mounted() {

    },
    data() {
        return {
            form: {
                image: null,
                image_seo: null,
                order: null,
            },
        }
    },

    methods: {
        onAddFile(error, file) {
            this.form.image = file.source;
        },

        create(data) {
            data._method = 'POST';
            this.$inertia.post(route('admin.product.feature.store', { id: this.id }), data, {
                onSuccess: page => {
                    this.$message({
                        type: 'success',
                        message: 'İşlem başarıyla tamamlandı.',
                    })
                    this.$inertia.get(route('admin.product.feature.index', { id: this.id }))
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

        errorsToMessage(errors) {
            let $errorBag = [];
            Object.keys(errors).map(function (value, key) {
                $errorBag += errors[value] + "<br>"
            });

            return $errorBag;
        },
    },
}
</script>
