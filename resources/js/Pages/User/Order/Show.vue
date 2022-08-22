<template>
    <app-layout title="Sipariş Detayları">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.order.index'))
                " title="Geri" :content="'#' + data.id + ' Sipariş Detayları'">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <el-descriptions title="Müşteri Bilgileri" direction="vertical" :column="4" border>
                    <el-descriptions-item label="Sipariş Numarası">{{
                            data.id
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Ad-Soyad">{{
                            data.name + ' ' + data.surname
                    }}</el-descriptions-item>
                    <el-descriptions-item label="E-Posta">{{
                            data.email
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Telefon">{{
                            data.phone
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Şehir">{{
                            data.city_view
                    }}</el-descriptions-item>
                    <el-descriptions-item label="İlçe">{{
                            data.county_view
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Adres">{{
                            data.address
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Zip Kodu">{{
                            data.zip_code
                    }}</el-descriptions-item>
                    <el-descriptions-item :span="4" label="Sipariş Notu">{{
                            data.note
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Oluşturulma Tarihi">{{
                            data.created_at
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Sipariş Durumu">{{
                            data.status_view
                    }}</el-descriptions-item>
                </el-descriptions>
                <el-descriptions v-if="data.status === 1" title="Ödeme Bilgileri" direction="vertical" :column="4"
                    class="mt-4" border>
                    <el-descriptions-item label="Kargo Ücreti">{{
                            data.cargo_price + ' TL'
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Ara Toplam">{{
                            data.sub_total_price + ' TL'
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Toplam">{{
                            data.total_price + ' TL'
                    }}</el-descriptions-item>
                </el-descriptions>
                <el-descriptions title="Satın Alınan Ürünler" direction="vertical" :column="4" class="mt-4" border>
                    <el-descriptions-item label="Ürün Listesi">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ürün</th>
                                    <th>Adet</th>
                                    <th>Adet Fiyatı</th>
                                    <th>Toplam Ücret</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product, index) in data.products">
                                    <td>{{ product.product_view }}</td>
                                    <td>{{ product.quantity }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.total_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </el-descriptions-item>
                </el-descriptions>
                <el-descriptions v-if="data.status === 3" title="Tamamlandı Bilgileri" direction="vertical" :column="4"
                    class="mt-4" border>
                    <el-descriptions-item label="Kargo Firması">{{
                            data.result.cargo_company_view
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Kargo Numarası">{{
                            data.result.shipping_no
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Not">{{
                            data.result.note
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Oluşturulma Tarihi">{{
                            data.result.created_at
                    }}</el-descriptions-item>
                </el-descriptions>
                <el-row class="mt-4">
                    <el-button v-if="data.status === 1" type="success" icon="el-icon-arrow-right" size="medium"
                        v-on:click="
                            $inertia.get(
                                route('user.order.create', {
                                    orderId: data.id,
                                })
                            )
                        ">Tamamla</el-button>
                </el-row>
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
        //
    },
};
</script>

<style>
.font-weight-bold {
    font-weight: bold;
}
</style>
