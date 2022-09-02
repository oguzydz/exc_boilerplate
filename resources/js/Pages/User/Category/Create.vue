<template>
    <app-layout title="Kategori Ekle">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.category.index'))
                " title="Geri" content="Kategori Oluştur">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Yeni Kategori Oluştur</div>
                    <div class="card-body">
                        <el-form :model="form" :rules="rules" ref="form" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Adı:" prop="title">
                                <el-input v-model="form.title" placeholder="Kategori adı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Açıklaması:" prop="text">
                                <el-input type="textarea" v-model="form.text"
                                    placeholder="Kategori açıklaması giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Sıra:" prop="order">
                                <el-input v-model="form.order" type="number" maxlength="11"
                                    placeholder="Kategori sırası giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Görsel:" prop="image">
                                <file-pond v-model="form.image" ref="pond"
                                    label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile" />
                                    <el-upload
  class="upload-demo"
  drag
  action="https://jsonplaceholder.typicode.com/posts/"
  :on-preview="handlePreview"
  :on-remove="handleRemove"
  :file-list="fileList"
  multiple>
  <i class="el-icon-upload"></i>
  <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
  <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
</el-upload>

                            </el-form-item>
                            <div class="float-right">
                                <el-button type="success" icon="el-icon-check" @click="submitForm('form')">GÖNDER
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
        errors: {},
    },

    data() {
        return {
            title: "ÜCRETSİZ HESAP OLUŞTURUN",
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
                // image: [
                //     {
                //         required: true,
                //         message: "Lütfen görsel giriniz.",
                //         trigger: "blur",
                //     },
                // ],
                order: [
                    {
                        required: true,
                        message: "Lütfen ürün sırası giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 1,
                        max: 1000,
                        trigger: "blur",
                    },
                ],
            },
            form: {
                title: null,
                text: null,
                image: null,
                order: null,
            },
        };
    },

    watch: {
        status: function (val) {
            this.setStatus(val);
        },
    },

    methods: {
        setStatus(status) {
            this.status = status;
        },

        onAddFile(error, file) {
            if (error) {
                this.$message({
                    type: "error",
                    dangerouslyUseHTMLString: true,
                    message:
                        "Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!",
                });
            }
            this.form.image = file.source;
        },
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "form") {
                        this.$inertia.post(
                            route("user.category.store"),
                            this.form,
                            {
                                onSuccess: (page) => {
                                   this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    this.$inertia.get(route('user.category.index'))
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
