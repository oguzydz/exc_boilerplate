<template>
    <app-layout :title="'#' + data.id + ' Sipariş Detayları'">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.order.index'))
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
                <el-descriptions v-if="data.status !== 0 " title="Ödeme Bilgileri" direction="vertical" :column="4"
                    class="mt-4" border>
                    <el-descriptions-item label="Payment Id">{{
                    data.payment.payment_id
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Fraud Status">{{
                    data.payment.fraud_status
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Sub Total Price">{{
                    data.payment.sub_total_price
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Total Price">{{
                    data.payment.total_price
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Currency">{{
                    data.payment.currency
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Merchant Commission Rate">{{
                    data.payment.merchant_commission_rate
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Merchant Commission Rate Amount">{{
                    data.payment.merchant_commission_rate_amount
                    }}</el-descriptions-item>
                    <el-descriptions-item label="İyzi Commission Rate">{{
                    data.payment.iyzi_commission_rate_amount
                    }}</el-descriptions-item>
                    <el-descriptions-item label="İyzi Commission Fee">{{
                    data.payment.iyzi_commission_fee
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Card Type">{{
                    data.payment.card_type
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Card Association">{{
                    data.payment.card_association
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Card Family">{{
                    data.payment.card_family
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Bin Number">{{
                    data.payment.bin_number
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Auth Code">{{
                    data.payment.auth_code
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Phase">{{
                    data.payment.phase
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Last Four Digits">{{
                    data.payment.last_four_digits
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Status">{{
                    data.payment.status
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Locale">{{
                    data.payment.locale
                    }}</el-descriptions-item>
                    <el-descriptions-item label="System Time">{{
                    data.payment.systemTime
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Created At">{{
                    data.payment.created_at
                    }}</el-descriptions-item>
                    <el-descriptions-item label="Updated At">{{
                    data.payment.updated_at
                    }}</el-descriptions-item>
                </el-descriptions>
                <el-descriptions v-if="data.status !== 0 " title="Transaction Bilgileri" direction="vertical"
                    :column="4" class="mt-4" border>
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
                                <tr v-for="(product, index) in data.products" v-bind:key="index">
                                    <td>{{ product.product_view }}</td>
                                    <td>{{ product.quantity }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.total_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </el-descriptions-item>
                </el-descriptions>
                <el-descriptions v-if="data.status > 1" title="Kargolandı/Gönderildi Bilgileri" direction="vertical"
                    :column="4" class="mt-4" border>
                    <el-descriptions-item label="Kargo Ücreti">{{
                    data.cargo_price
                    }}</el-descriptions-item>
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
                    <el-button v-if="data.status === 3" type="success" icon="el-icon-arrow-right" size="medium"
                        @click="confirm()">Onayla</el-button>
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
                route("admin.order.paymentApprove", { orderId: this.data.id, }),
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

<style>
.font-weight-bold {
    font-weight: bold;
}
</style>
