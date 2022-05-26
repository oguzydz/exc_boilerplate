<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.index'))
                " title="Geri" content="Dükkan Yönetimi">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">
                        Dükkan Yönetimi
                        <a :href="route(data.slug + '.index')" target="blank">
                            <el-button type="success" class="float-right" icon="el-icon-thumb" size="mini">
                                Dükkanı Görüntüle
                            </el-button>
                        </a>
                    </div>
                    <div class="card-body">
                        <el-form :model="data" :rules="rules" ref="data" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Dükkan Adı:" prop="title">
                                <el-input v-model="data.title" placeholder="Dükkan adı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Açıklaması:" prop="text">
                                <el-input type="textarea" v-model="data.text" placeholder="Dükkan açıklaması giriniz.">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="E-Posta:" prop="email">
                                <el-input v-model="data.email" placeholder="Dükkan e-postası giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Telefon:" prop="phone">
                                <el-input v-model="data.phone" type="number" maxlength="11"
                                    placeholder="Cep telefonu numaranız."></el-input>
                            </el-form-item>
                            <el-form-item label="İnstagram Link:" prop="instagram">
                                <el-input v-model="data.instagram" placeholder="İnstagram linkinizi giriniz.">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Facebook Link:" prop="facebook">
                                <el-input v-model="data.facebook" placeholder="Facebook linkinizi giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Twitter Link:" prop="twitter">
                                <el-input v-model="data.twitter" placeholder="Twitter linkinizi giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Logo:" prop="logo">
                                <file-pond v-model="data.logo" ref="pond"
                                    label-idle="Güncellemek için Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile" />
                                <img :src="'/storage/' + logo" class="img" style="width: 100px" />
                            </el-form-item>
                            <el-form-item label="Arka Plan:" prop="bg_image">
                                <file-pond v-model="data.bg_image" ref="pond"
                                    label-idle="Güncellemek için Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFileBg" />
                                <img :src="'/storage/' + bg_image" class="img" style="width: 400px" />
                            </el-form-item>
                            <div class="float-right">
                                <el-button type="success" icon="el-icon-check" @click="submitForm('data')">GÖNDER
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
            title: "Dükkan Yönetimi",
            logo: this.data.logo,
            bg_image: this.data.bg_image,
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
                phone: [
                    {
                        required: true,
                        message: "Lütfen telefon numaranızı giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 11,
                        max: 11,
                        message:
                            "Numaranız 11 haneli olmalı, Örnek: 05394964002",
                        trigger: "blur",
                    },
                ],
                email: [
                    {
                        required: true,
                        message: "Lütfen e-posta adresi giriniz.",
                        trigger: "blur",
                    },
                    {
                        type: "email",
                        message: "Lütfen doğru e-posta adresi giriniz.",
                        trigger: ["blur", "change"],
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
            this.data.logo = file.source;
        },
        onAddFileBg(error, file) {
            if (error) {
                this.$message({
                    type: "error",
                    dangerouslyUseHTMLString: true,
                    message:
                        "Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!",
                });
            }
            this.data.bg_image = file.source;
        },
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "data") {
                        this.$inertia.post(
                            route("user.company.update"),
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
