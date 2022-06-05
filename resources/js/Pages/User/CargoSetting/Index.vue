<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.index'))
                " title="Geri" content="Kargo Ayarları">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">
                        Kargo Ayarları
                    </div>
                    <div class="card-body">
                        <el-form :model="data" :rules="rules" ref="data" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Kargo Ücreti:" prop="price">
                                <el-input v-model="data.price" type="number" maxlength="11" placeholder="Kargo ücreti.">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Ücretsiz Gönderim Ücreti:" prop="after_free_price">
                                <el-input v-model="data.after_free_price" type="number" maxlength="11"
                                    placeholder="Kargo ücretsiz gönderim ücreti.">
                                </el-input>
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
            rules: {
                price: [
                    {
                        required: true,
                        message: "Lütfen Kargo ücreti giriniz.",
                        trigger: "blur",
                    },
                ],
                after_free_price: [
                    {
                        required: true,
                        message: "Lütfen Kargo ücretsiz gönderim ücreti giriniz.",
                        trigger: "blur",
                    },
                ],
            },
        };
    },

    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "data") {
                        this.$inertia.post(
                            route("user.cargoSetting.update"),
                            this.data,
                            {
                                onSuccess: (page) => {
                                    this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
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
