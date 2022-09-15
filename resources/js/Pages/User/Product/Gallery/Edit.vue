<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.product.gallery.index', productId))
                " title="Geri" content="Ürün Resim Düzenleme">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">{{ data.id }} - Düzenle</div>
                    <div class="card-body">
                        <el-form :model="data" :rules="rules" ref="data" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Sıra:" prop="order">
                                <el-input v-model="data.order" type="number" maxlength="11"
                                    placeholder="Ürün sırası giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Görsel(394x394):" prop="image">
                                <file-pond v-model="data.image" ref="pond"
                                    label-idle="Güncellemek için Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile" :captureMethod="null"/>
                                <img :src="'/storage/' + image" class="img" style="width: 100px" />
                            </el-form-item>
                            <div class="float-right">
                                <el-button type="success" icon="el-icon-check" @click="submitForm('data')">KAYDET
                                </el-button>
                            </div>
                        </el-form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import PageTitle from "@/Components/User/PageTitle";

import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
)

export default {
    components: {
        AppLayout,
        FilePond,
        PageTitle,
    },
    props: {
        data: {},
        errors: {},
        categories: {},
        statusList: Array,
        productId: Number
    },

    data() {
        return {
            title: "Ürün Galeri Resmi Düzenleme",
            image: this.data.image,
            rules: {
                order: [
                    {
                        required: true,
                        message: "Lütfen ürün sırası giriniz.",
                        trigger: "blur",
                    },
                ],
            },
        };
    },

    methods: {
        onAddFile(error, file) {
            if (error) {
                this.$message({
                    type: "error",
                    dangerouslyUseHTMLString: true,
                    message:
                        "Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!",
                });
            }
            this.data.new_image = file.source;
        },
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "data") {
                        this.$inertia.post(
                            route("user.product.gallery.update", { productId: this.data.product_id, galleryId: this.data.id }),
                            this.data,
                            {
                                onSuccess: (page) => {
                                    this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    location.reload();
                                },
                                onError: (errors) => {
                                    this.$message({
                                        type: "error",
                                        dangerouslyUseHTMLString: true,
                                        message:
                                            "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                            this.errorsToMessage(errors),
                                    });
                                },
                            }
                        );
                    } else {
                        //if (this.active++ > 2) this.active = 0;
                    }
                } else {
                    console.log("error submit!!");
                    return false;
                }
            });
        },
    },
};
</script>
