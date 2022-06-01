<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.newCustomer.index'))
                " title="Geri" content=" Yeni Üyeler">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <el-descriptions title="Kişisel Bilgiler" direction="vertical" :column="4" border>
                    <el-descriptions-item label="#ID">{{
                            data.id
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Ad-Soyad">{{
                            data.name
                    }}</el-descriptions-item>
                    <el-descriptions-item label="E-Posta">{{
                            data.email
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Telefon">{{
                            data.phone
                    }}</el-descriptions-item>
                    <el-descriptions-item label="TC">{{
                            data.tc
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Doğum Tarihi">{{
                            data.born_date
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Üyelik Tipi">{{
                            data.type.name
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Şehir">{{
                            data.city.city
                    }}</el-descriptions-item>
                    <el-descriptions-item label="İlçe">{{
                            data.county.county
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Adres">{{
                            data.address
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Durum">{{
                            data.status_view
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Kayıt Tarihi">{{
                            data.created_at
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Güncellenme Tarihi">{{
                            data.updated_at
                    }}</el-descriptions-item>
                </el-descriptions>

                <el-descriptions title="Hesap/Şirket Bilgileri" direction="vertical" :column="4" class="mt-4" border>
                    <el-descriptions-item label="#Iban">{{
                            data.iban.iban
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Şirket Ünvanı">{{
                            data.company.corporate_name
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Vergi No:">{{
                            data.company.taxpayer_identification_number
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Vergi Dairesi">{{
                            data.company.tax_office
                    }}</el-descriptions-item>
                </el-descriptions>

                <el-descriptions title="Mağaza Bilgileri" direction="vertical" :column="4" class="mt-4" border>
                    <el-descriptions-item label="Mağaza Adı">{{
                            data.company.title
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza E-Posta">{{
                            data.company.email
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Telefon">{{
                            data.company.phone
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Adı">{{
                            data.company.title
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Açıklaması:">{{
                            data.company.text
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Logo:">{{
                            data.company.logo
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Arka Plan:">{{
                            data.company.bg_image
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mağaza Slug:">{{
                            data.company.slug
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Güncellenme Tarihi:">{{
                            data.company.updated_at
                    }}</el-descriptions-item>
                </el-descriptions>

                <el-row class="mt-4">
                    <el-button type="success" v-if="data.status === 4" icon="el-icon-check" @click="confirm()">Onayla
                    </el-button>
                    <el-button type="danger" v-if="data.status === 1 || data.status === 4" icon="el-icon-delete"
                        size="mini" v-on:click="
                            $inertia.get(
                                route('admin.newCustomer.cancel', {
                                    id: data.id,
                                })
                            )
                        ">Reddet</el-button>
                </el-row>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppAdminLayout";
import PageTitle from "@/Components/User/PageTitle";

export default {
    components: {
        AppLayout,
        PageTitle,
    },
    props: {
        data: {},
        markQuestions: {},
        errors: {},
    },
    data() {
        return {
            //
        };
    },
    methods: {
        confirm() {
            this.$inertia.post(
                route("admin.newCustomer.confirm", [this.data.id]),
                {},
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
        },
    },
};
</script>
