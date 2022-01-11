<template>
    <app-layout title="Ürün Oluştur">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header
                    @back="goBack"
                    title="Geri"
                    content="Ürün Oluştur"
                >
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Yeni Ürün Oluştur</div>
                    <div class="card-body">
                        <el-form
                            :model="form"
                            :rules="rules"
                            ref="form"
                            label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'"
                            size="medium"
                        >
                            <el-form-item label="Kategori:" prop="category_id">
                                <el-select
                                    v-model="form.category_id"
                                    placeholder="Kategori seçiniz."
                                >
                                    <el-option
                                        v-for="(category, index) in categories"
                                        :label="category.title"
                                        :value="category.id"
                                        :key="index"
                                    ></el-option>
                                </el-select>
                            </el-form-item>

                            <el-form-item label="Adı:" prop="title">
                                <el-input
                                    v-model="form.title"
                                    placeholder="Ürün adı giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Açıklaması:" prop="text">
                                <el-input
                                    type="textarea"
                                    rows="5"
                                    v-model="form.text"
                                    placeholder="Ürün açıklaması giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Fiyat:" prop="price">
                                <el-input
                                    v-model="form.price"
                                    type="number"
                                    maxlength="11"
                                    placeholder="Ürün fiyatı giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item
                                label="İndirimsiz Fiyat:"
                                prop="discount_price"
                            >
                                <el-input
                                    v-model="form.discount_price"
                                    type="number"
                                    maxlength="11"
                                    placeholder="Ürün indirimsiz fiyatı giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item
                                label="Stok Sayısı:"
                                prop="stock"
                            >
                                <el-input
                                    v-model="form.stock"
                                    type="number"
                                    maxlength="11"
                                    placeholder="Ürün stok sayısı giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item
                                label="Kargo Süresi:"
                                prop="delivery_time"
                            >
                                <el-input
                                    v-model="form.delivery_time"
                                    type="number"
                                    maxlength="11"
                                    placeholder="Ürün kargo süresi giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Sıra:" prop="order">
                                <el-input
                                    v-model="form.order"
                                    type="number"
                                    maxlength="11"
                                    placeholder="Ürün sırası giriniz."
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="Görsel(394x394):" prop="image">
                                <file-pond
                                    v-model="form.image"
                                    ref="pond"
                                    label-idle="Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false"
                                    accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile"
                                />
                            </el-form-item>
                            <div class="float-right">
                                <el-button
                                    type="success"
                                    icon="el-icon-check"
                                    @click="submitForm('form')"
                                    >GÖNDER</el-button
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
        categories: Object,
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
                image: [
                    {
                        required: true,
                        message: "Lütfen görsel giriniz.",
                        trigger: "blur",
                    },
                ],
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
                price: [
                    {
                        required: true,
                        message: "Lütfen ürün fiyatı giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 1,
                        max: 100000,
                        trigger: "blur",
                    },
                ],
                discount_price: [
                    {
                        required: true,
                        message: "Lütfen ürün indirimsiz fiyatı giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 1,
                        max: 100000,
                        trigger: "blur",
                    },
                ],
                delivery_time: [
                    {
                        required: true,
                        message: "Lütfen ürün kargo süresi giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 1,
                        max: 60,
                        trigger: "blur",
                    },
                ],
                stock: [
                    {
                        required: true,
                        message: "Lütfen ürün stok sayısı giriniz.",
                        trigger: "blur",
                    },
                    {
                        min: 1,
                        max: 100000,
                        trigger: "blur",
                    },
                ],
                category_id: [
                    {
                        required: true,
                        message: "Lütfen kategori seçiniz.",
                        trigger: "change",
                    },
                ],
            },
            form: {
                title: null,
                text: null,
                price: null,
                discount_price: null,
                delivery_time: null,
                stock: null,
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
                            route("user.product.store"),
                            this.form,
                            {
                                onSuccess: (page) => {
                                    console.log(page);
                                    this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    this.$inertia.get(
                                        route("user.product.index")
                                    );
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

        isMobile() {
            if (
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                    navigator.userAgent
                )
            ) {
                return true;
            } else {
                return false;
            }
        },
    },
};
</script>
