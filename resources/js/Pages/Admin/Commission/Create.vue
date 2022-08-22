<template>
    <app-layout title="Komisyon Ekle">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.commission.index'))
                " title="Geri" content="Komisyon Oluştur">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Yeni Komisyon Oluştur</div>
                    <div class="card-body">
                        <el-form :model="form" :rules="rules" ref="form" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Aylık Toplam Satış:" prop="price">
                                <el-input v-model="form.price" type="number" maxlength="11"
                                    placeholder="Lütfen aylık toplam satış giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="En Yüksek Aylık Toplam Satış:" prop="finish_price">
                                <el-input v-model="form.finish_price" type="number" maxlength="11"
                                    placeholder="Lütfen en yüksek aylık toplam satış giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Yüzdelik Kesinti:" prop="percent">
                                <el-input v-model="form.percent" type="number" maxlength="11"
                                    placeholder="Lütfen yüzdelik kesinti giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="İşlem Ücreti:" prop="local_processing_fee">
                                <el-input v-model="form.local_processing_fee" type="number" maxlength="11"
                                    placeholder="Lütfen işlem ücreti giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Yurt Dışı İşlem Ücreti:" prop="foreign_proccessing_fee">
                                <el-input v-model="form.foreign_proccessing_fee" type="number" maxlength="11"
                                    placeholder="Lütfen yurt dışı işlem ücreti giriniz."></el-input>
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
                price: null,
                finish_price: null,
                percent: null,
                local_processing_fee: null,
                foreign_proccessing_fee: null,
            },
        };
    },

    watch: {
        status: function (val) {
            this.setStatus(val);
        },
    },

    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "form") {
                        this.$inertia.post(
                            route("admin.commission.store"),
                            this.form,
                            {
                                onSuccess: (page) => {
                                   this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    this.$inertia.get(route('admin.commission.index'))
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
