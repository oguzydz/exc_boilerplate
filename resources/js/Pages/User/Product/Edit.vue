<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.product.index'))
                " title="Geri" :content="data.title">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">{{ data.title }} - Düzenle</div>
                    <div class="card-body">
                        <el-form :model="data" :rules="rules" ref="data" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Kategori:" prop="category_id">
                                <el-select v-model="data.category_id" placeholder="Kategori seçiniz.">
                                    <el-option v-for="(category, index) in categories" :label="category.title"
                                        :value="category.id" :key="index"></el-option>
                                </el-select>
                            </el-form-item>

                            <el-form-item label="Adı:" prop="title">
                                <el-input v-model="data.title" placeholder="Ürün adı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Açıklaması:" prop="text">
                                <el-input type="textarea" rows="5" v-model="data.text"
                                    placeholder="Ürün açıklaması giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Fiyat:" prop="price">
                                <el-input v-model="data.price" type="number" maxlength="11"
                                    placeholder="Ürün fiyatı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="İndirimsiz Fiyat:" prop="discount_price">
                                <el-input v-model="data.discount_price" type="number" maxlength="11"
                                    placeholder="Ürün indirimsiz fiyatı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Stok Sayısı:" prop="stock">
                                <el-input v-model="data.stock" type="number" maxlength="11"
                                    placeholder="Ürün stok sayısı giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Kargo Süresi:" prop="delivery_time">
                                <el-input v-model="data.delivery_time" type="number" maxlength="11"
                                    placeholder="Ürün kargo süresi giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Sıra:" prop="order">
                                <el-input v-model="data.order" type="number" maxlength="11"
                                    placeholder="Ürün sırası giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Durum:" prop="status">
                                <el-select v-model="data.status" placeholder="Durum Seçiniz.">
                                    <el-option v-for="(
                                            status, statusIndex
                                        ) in statusList" :key="status" :label="statusIndex" :value="status">
                                    </el-option>
                                </el-select>
                            </el-form-item>

                            <el-form-item label="Görsel(394x394):" prop="image">
                                <file-pond v-model="data.image" ref="pond"
                                    label-idle="Güncellemek için Sürükle veya <span class='filepond--label-action'>Tıkla</span>"
                                    :allow-multiple="false" accepted-file-types="image/jpeg, image/png"
                                    @addfile="onAddFile" />
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
        categories: Object,
        statusList: Array,
    },

    data() {
        return {
            title: "Ürün Düzenleme",
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
                order: [
                    {
                        required: true,
                        message: "Lütfen ürün sırası giriniz.",
                        trigger: "blur",
                    },
                ],
                price: [
                    {
                        required: true,
                        message: "Lütfen ürün fiyatı giriniz.",
                        trigger: "blur",
                    },
                ],
                discount_price: [
                    {
                        required: true,
                        message: "Lütfen ürün indirimsiz fiyatı giriniz.",
                        trigger: "blur",
                    },
                ],
                delivery_time: [
                    {
                        required: true,
                        message: "Lütfen ürün kargo süresi giriniz.",
                        trigger: "blur",
                    },
                ],
                stock: [
                    {
                        required: true,
                        message: "Lütfen ürün stok sayısı giriniz.",
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
                            route("user.product.update"),
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
