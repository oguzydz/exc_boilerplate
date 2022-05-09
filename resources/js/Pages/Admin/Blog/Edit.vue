<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header
                    @back="goBack"
                    title="Geri"
                    content="Blog Düzenleme"
                >
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">{{ data.title }} - Düzenle</div>
                    <div class="card-body">
                        <el-form
                            :model="data"
                            :rules="rules"
                            ref="data"
                            label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'"
                            size="medium"
                        >
                            <el-form-item label="Blog Adı:" prop="title">
                                <el-input
                                    v-model="data.title"
                                    placeholder="Blog adı giriniz."
                                ></el-input>
                            </el-form-item>
                           <el-form-item label="Açıklaması:" prop="text">
                                <el-input
                                    type="textarea"
                                    v-model="data.text"
                                    placeholder="Blog açıklaması giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Görsel Seo:" prop="image_seo">
                                <el-input
                                    v-model="data.image_seo"
                                    type="text"
                                    maxlength="11"
                                    placeholder="Görsel seo giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Görsel:" prop="logo">
                                <file-pond
                                    v-model="data.image"
                                    ref="pond"
                                    label-idle="Güncellemek için Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false"
                                    accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile"
                                />
                                <img
                                    :src="'/storage/' + image"
                                    class="img"
                                    style="width: 100px"
                                />
                            </el-form-item>
                            <div class="float-right">
                                <el-button
                                    type="success"
                                    icon="el-icon-check"
                                    @click="submitForm('data')"
                                    >KAYDET</el-button
                                >
                            </div>
                        </el-form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppAdminLayout";
import PageTitle from "@/Components/User/PageTitle";

import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import { VueEditor } from "vue3-editor";

const FilePond = vueFilePond();


export default {
    components: {
        AppLayout,
        FilePond,
        VueEditor,
        PageTitle,
    },
    props: {
        data: {},
        errors: {},
    },

    data() {
        return {
            title: "Blog Düzenleme",
            image: this.data.image,
            rules: {
                title: [
                    {
                        required: true,
                        message: "Lütfen ürün adı alanını doldurunuz.",
                        trigger: "blur",
                    },
                    {
                        min: 3,
                        max: 40,
                        message: "En küçük 3, en fazla 40 karakter olabilir.",
                        trigger: "blur",
                    },
                ],
                text: [
                    {
                        required: true,
                        message: "Lütfen ürün açıklaması giriniz.",
                        trigger: "blur",
                    },
                ],
                image_seo: [
                    {
                        required: true,
                        message: "Lütfen görsel seo giriniz.",
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
                            route("admin.blog.update"),
                            this.data,
                            {
                                onSuccess: (page) => {
                                    this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    location.reload()
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
