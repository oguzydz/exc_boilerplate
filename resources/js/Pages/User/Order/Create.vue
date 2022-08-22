<template>
    <app-layout title="Siparişi Tamamla">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.order.show', { orderId: data.id }))
                " title="Geri" :content="'#' + data.id + ' Siparişi Tamamla'">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Sipariş Tamamlama Formu</div>
                    <div class="card-body">
                        <el-form :model="form" :rules="rules" ref="form" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <div v-if="data.type === 0">
                                <el-form-item label="Kargo Firması:" prop="cargo_company_id">
                                    <el-select filterable v-model="form.cargo_company_id" placeholder="Kargo firması seçiniz.">
                                        <el-option v-for="(
                                            cargoCompany, index
                                        ) in cargoCompanies" :key="index" :label="cargoCompany.name"
                                            :value="cargoCompany.id">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Kargo Numarası:" prop="shipping_no">
                                    <el-input v-model="form.shipping_no" placeholder="Kargo numarası giriniz."></el-input>
                                </el-form-item>
                            </div>
                            <el-form-item label="Sipariş Açıklaması:" prop="note">
                                <el-input type="textarea" rows="5" v-model="form.note"
                                    placeholder="Sipariş açıklaması giriniz."></el-input>
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
import { VueEditor } from "vue3-editor";

export default {
    components: {
        AppLayout,
        VueEditor,
        PageTitle,
    },
    props: {
        errors: {},
        data: Object,
        cargoCompanies: Object,
    },
    data() {
        return {
            title: "ÜCRETSİZ HESAP OLUŞTURUN",
            rules: {
                shipping_no: [
                    {
                        required: this.data.type === 0 ?? false,
                        message: "Lütfen ürün adı alanını doldurunuz.",
                        trigger: "blur",
                    },
                    {
                        min: 3,
                        max: 255,
                        message: "En küçük 3, en fazla 255 karakter olabilir.",
                        trigger: "blur",
                    },
                ],
                note: [
                    {
                        required: true,
                        message: "Lütfen sipariş açıklaması giriniz.",
                        trigger: "blur",
                    },
                ],
                cargo_company_id: [
                    {
                        required: this.data.type === 0 ?? false,
                        message: "Lütfen kargo firması seçiniz.",
                        trigger: "change",
                    },
                ],
            },
            form: {
                type: this.data.type
            },
        };
    },
    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "form") {
                        this.$inertia.post(
                            route("user.order.store", { orderId: this.data.id }),
                            this.form,
                            {
                                onSuccess: (page) => {
                                   this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    this.$inertia.get(
                                        route('user.order.show', { orderId: this.data.id })
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
