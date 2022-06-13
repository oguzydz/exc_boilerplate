<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.commission.index'))
                " title="Geri" content="Komisyon Ayaları">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Komisyon Ayarlarını- Düzenle</div>
                    <div class="card-body">
                        <el-form :model="data" :rules="rules" ref="data" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Aylık Toplam Satış:" prop="price">
                                <el-input v-model="data.price" type="number" maxlength="25"
                                    placeholder="Aylık Toplam Satış giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="En Yüksek Aylık Toplam Satış:" prop="finish_price">
                                <el-input v-model="data.finish_price" type="number" maxlength="25"
                                    placeholder="En yüksek aylık toplam satış giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Yüzdelik Kesinti:" prop="percent">
                                <el-input v-model="data.percent" type="number" maxlength="11"
                                    placeholder="Yüzdelik Kesinti giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="İşlem Ücreti:" prop="local_processing_fee">
                                <el-input v-model="data.local_processing_fee" type="number" maxlength="11"
                                    placeholder="İşlem ücreti giriniz."></el-input>
                            </el-form-item>
                            <el-form-item label="Yurt Dışı İşlem Ücreti:" prop="foreign_proccessing_fee">
                                <el-input v-model="data.foreign_proccessing_fee" type="number" maxlength="11"
                                    placeholder="Yurtdışı işlem ücreti giriniz."></el-input>
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
        commissionId: Number,
    },

    data() {
        return {
            rules: {
                price: [
                    {
                        required: true,
                        message: "Aylık toplam satış bulunuz.",
                        trigger: "blur",
                    },
                ],
                finish_price: [
                    {
                        required: true,
                        message: "En yüksek aylık toplam satış giriniz.",
                        trigger: "blur",
                    },
                ],
                percent: [
                    {
                        required: true,
                        message: "Yüzdelik kesinti giriniz.",
                        trigger: "blur",
                    },
                ],
                local_processing_fee: [
                    {
                        required: true,
                        message: "İşlem ücreti giriniz.",
                        trigger: "blur",
                    },
                ],
                foreign_proccessing_fee: [
                    {
                        required: true,
                        message: "Yurt dışı işlem ücreti giriniz.",
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
                            route("admin.commission.update", { commissionId: this.commissionId }),
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
