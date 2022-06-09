<template>
    <app-layout :title="title">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.contact.index'))
                " title="Geri" content="İletişim Detayları">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <el-descriptions :title="'Mesaj Numarası: ' + data.id " direction="vertical" :column="4" border>
                    <el-descriptions-item label="#ID">{{
                            data.id
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Ad-Soyad">{{
                            data.name
                    }}</el-descriptions-item>s
                    <el-descriptions-item label="E-Posta">{{
                            data.email
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mesaj Başlığı">{{
                            data.text
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Mesaj">{{
                            data.message
                    }}</el-descriptions-item>
                </el-descriptions>
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
            this.$inertia.get(
                route("admin.contact.confirm", [this.data.id]),
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
        },
    },
};
</script>
