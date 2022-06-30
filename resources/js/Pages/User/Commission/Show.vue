<template>
    <app-layout title="Komisyon Detayları">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.commission.index'))
                " title="Geri" content="Komisyon Detayları">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <el-descriptions direction="vertical" :column="4" border>
                    <el-descriptions-item label="Aylık Toplam Ücret">{{
                            data.price
                    }}</el-descriptions-item>
                    <el-descriptions-item label="En Yüksek Aylık Toplam Ücret">{{
                            data.finish_price
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Yüzdelik Kesinti">{{
                            data.percent
                    }}</el-descriptions-item>
                    <el-descriptions-item label="İşlem Ücreti">{{
                            data.local_processing_fee
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Yurt Dışı İşlem Ücreti">{{
                            data.foreign_proccessing_fee
                    }}</el-descriptions-item>

                </el-descriptions>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
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
                route("user.commission.confirm", [this.data.id]),
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
