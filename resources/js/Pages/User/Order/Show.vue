<template>
    <app-layout :title="`Sipariş Detay`">
        <div class="row">
            <div class="col-sm-12 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header font-bold">
                        <el-button
                            icon="el-icon-back"
                            type="success"
                            size="mini"
                            @click="$inertia.get(route('user.order.index'))"
                        >
                            Siparişlerim
                        </el-button>
                        #{{ order.id }} - Sipariş Detayı
                    </div>
                    <div class="card-body">
                        <el-descriptions
                            class="margin-top"
                            :column="1"
                            size="medium"
                            border
                        >
                            <el-descriptions-item>
                                <template #label>
                                    <i class="fad fa-hashtag"></i>
                                    Sipariş Numarası
                                </template>
                                <span class="font-bold">
                                    #{{ order.id }} - {{ order.product.title }}
                                </span>
                            </el-descriptions-item>
                            <el-descriptions-item>
                                <template #label>
                                    <i class="fad fa-lira-sign"></i>
                                    Sipariş Ücreti
                                </template>
                                <span class="font-bold">
                                    {{ order.product.price }} TL
                                </span>
                            </el-descriptions-item>
                            <el-descriptions-item>
                                <template #label>
                                    <i class="fad fa-shipping-timed"></i>
                                    Sipariş Durumu
                                </template>
                                <div class="flex items-center">
                                    <el-tag
                                        class="mr-2"
                                        effect="plain"
                                        :size="orderStatus(order.status).tag"
                                    >
                                        {{ orderStatus(order.status).title }}
                                    </el-tag>
                                    <el-button
                                        style="margin-left: auto"
                                        size="mini"
                                        @click="editPayment"
                                        v-if="false"
                                    >
                                        Ödemeyi Düzenle
                                    </el-button>
                                </div>
                            </el-descriptions-item>
                            <el-descriptions-item>
                                <template #label>
                                    <i class="fad fa-align-justify"></i>
                                    Sipariş İçeriği
                                </template>
                                <span
                                    v-html="order.text"
                                    class="break-all"
                                ></span>
                                <el-button
                                    size="mini"
                                    @click="editTextVisible = true"
                                    v-if="
                                        order.status === 0 || order.status === 1
                                    "
                                >
                                    Düzenle
                                </el-button>
                            </el-descriptions-item>
                            <el-descriptions-item v-if="order.status === 3">
                                <template #label>
                                    <i class="fad fa-clipboard-check"></i>
                                    Sipariş Sonucu
                                </template>
                                <h6>Açıklama</h6>
                                <p>
                                    <span v-html="orderResult.text"></span>
                                </p>
                                <el-button
                                    type="success"
                                    size="mini"
                                    v-if="orderResult.file_link"
                                    plain
                                    @click="
                                        openOrderLink(orderResult.file_link)
                                    "
                                >
                                    Dosyayı İndir
                                </el-button>
                                <el-button
                                    type="danger"
                                    size="mini"
                                    class="mx-2"
                                    plain
                                >
                                    Bildir
                                </el-button>
                            </el-descriptions-item>
                            <el-descriptions-item v-if="order.status === 5">
                                <template #label>
                                    <i class="fad fa-exclamation-circle"></i>
                                    Sipariş Sonucu
                                </template>
                                <h6>Açıklama</h6>
                                <p>
                                    Yaptığımız kontrollere göre tarafımıza
                                    ödemeniz ulaşmamıştır, tekrar
                                    <b>"Ödeme Yap"</b>
                                    butonuna basarak sipariş durumunu ödeme
                                    yapıldı olarak değiştirebilirsiniz veya bir
                                    sorun olduğunu düşünüyorsanız
                                    <b>"Destek Al"</b>
                                    butonuna basarak ekiplerimizle iletişim
                                    sağlayabilirsiniz.
                                </p>
                                <el-button
                                    @click="makePaymentVisible = true"
                                    size="medium"
                                    type="primary"
                                >
                                    <i
                                        class="fad fa-credit-card-front mr-2"
                                    ></i>
                                    Ödeme Yap
                                </el-button>
                            </el-descriptions-item>
                        </el-descriptions>
                        <div
                            class="py-1 mt-2"
                            v-if="order.status === 0 || order.status === 1"
                        >
                            <el-alert
                                show-icon
                                title="Bilgilendirme"
                                description="Sipariş Durumunuz 'İŞLEME ALINDI' olana kadar sipariş içeriğini güncelleyebilirsiniz!"
                                type="info"
                            ></el-alert>
                        </div>
                        <div
                            class="py-1"
                            v-if="order.status === 0 || order.status === 1"
                        >
                            <el-alert
                                show-icon
                                title="Bilgilendirme"
                                description="Siparişiniz uzun süre 'İŞLEME ALINDI' olmadıysa lütfen ödemenizi kontrol ediniz."
                                type="info"
                            ></el-alert>
                        </div>
                        <div class="py-1" v-if="order.status === 0">
                            <el-alert
                                title="Ödeme Yapılmadı"
                                description="Siparişini ödeme yaparak işleme alabilirsiniz!"
                                type="warning"
                                show-icon
                                :closable="false"
                            ></el-alert>
                        </div>
                        <div class="py-2" v-if="order.status === 0">
                            <el-button
                                @click="makePaymentVisible = true"
                                size="medium"
                                type="primary"
                            >
                                <i class="fad fa-credit-card-front mr-2"></i>
                                Ödeme Yap
                            </el-button>
                        </div>
                        <div class="py-2" v-if="order.status === 2">
                            <el-alert
                                show-icon
                                title="Bilgilendirme"
                                description="Sipariş durumunuz işleme alınmıştır en kısa süre içerisinde istekleriniz teslim edilecektir."
                                type="success"
                            ></el-alert>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4">
                <div class="card mt-2 mt-md-0">
                    <div class="card-header font-bold">Ürün</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img
                                    class="rounded"
                                    :src="`/storage/${order.product.image}`"
                                />
                            </div>
                            <div class="col-md-8">
                                <h4 class="mt-2 mt-md-0">
                                    {{ order.product.title }}
                                </h4>
                                <div
                                    class="
                                        py-1
                                        text-[#564fd0]
                                        font-bold
                                        text-2xl
                                        border-white
                                    "
                                >
                                    <sup class="line-through text-sm"
                                        >{{
                                            order.product.discount_price
                                        }}
                                        TL</sup
                                    >
                                    {{ order.product.price }}
                                    TL
                                </div>
                                <p
                                    class="text-sm mt-2"
                                    v-html="order.product.text"
                                ></p>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="
                                                flex
                                                items-start
                                                py-2
                                                text-base
                                                space-x-4
                                                border-bottom border-gray-300
                                            "
                                        >
                                            <div class="text-[#564fd0]">
                                                <i
                                                    class="
                                                        fad
                                                        fa-shipping-timed
                                                    "
                                                ></i>
                                            </div>
                                            <div class="font-bold">
                                                Teslimat Süresi:
                                            </div>
                                            <div>
                                                {{
                                                    order.product.delivery_time
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="
                                                flex
                                                items-start
                                                py-2
                                                text-base
                                                space-x-4
                                                border-bottom border-gray-300
                                            "
                                        >
                                            <div class="text-[#564fd0]">
                                                <i
                                                    class="
                                                        fad
                                                        fa-credit-card-front
                                                    "
                                                ></i>
                                            </div>
                                            <div class="font-bold">
                                                Ödeme Seçenekleri:
                                            </div>
                                            <div>Papara, Havale ve EFT</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="
                                                flex
                                                items-start
                                                py-2
                                                text-base
                                                space-x-4
                                                border-bottom border-gray-300
                                            "
                                        >
                                            <div class="text-[#564fd0]">
                                                <i
                                                    class="fad fa-user-headset"
                                                ></i>
                                            </div>
                                            <div class="font-bold">
                                                Satış Sonrası Destek:
                                            </div>
                                            <div>Aktif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div
                                            class="
                                                flex
                                                items-start
                                                py-2
                                                text-base
                                                space-x-4
                                            "
                                        >
                                            <div>
                                                <button
                                                    @click="whatsappOrder"
                                                    class="
                                                        btn btn-primary
                                                        text-white
                                                        p-2
                                                    "
                                                    style="
                                                        background-color: #564fd0 !important;
                                                        border-color: #564fd0 !important;
                                                    "
                                                >
                                                    <i
                                                        class="fad fa-headset"
                                                    ></i>
                                                    Destek Al
                                                </button>
                                            </div>
                                            <div v-if="order.status === 0">
                                                <button
                                                    @click="
                                                        cancelOrderVisible = true
                                                    "
                                                    class="
                                                        btn btn-outline-danger
                                                        p-2
                                                    "
                                                >
                                                    <i
                                                        class="fad fa-power-off"
                                                    ></i>
                                                    İptal Et
                                                </button>
                                            </div>
                                            <div v-if="order.status === 4">
                                                <button
                                                    @click="againMakeOrder"
                                                    class="
                                                        btn btn-primary
                                                        text-white
                                                        p-2
                                                    "
                                                    style="
                                                        background-color: #564fd0 !important;
                                                        border-color: #564fd0 !important;
                                                    "
                                                >
                                                    <i class="fad fa-redo"></i>
                                                    Tekrar İşleme Al
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>

    <jet-dialog-modal :show="editTextVisible" @close="closeModal">
        <template #title>Sipariş İçeriği</template>

        <template #content>
            <vue-editor v-model="order.text"></vue-editor>
            <div class="mt-4"></div>
        </template>

        <template #footer>
            <jet-secondary-button @click="closeModal">
                İptal
            </jet-secondary-button>

            <jet-button class="ml-2" :disabled="processing" @click="update">
                <span v-if="processing">Güncelleniyor</span>
                <span v-else>Güncelle</span>
            </jet-button>
        </template>
    </jet-dialog-modal>

    <jet-dialog-modal :show="makePaymentVisible" @close="closeMakeModal">
        <template #title>
            <div class="flex items-start space-x-1">
                <div
                    v-if="activePaymentMethod !== null"
                    @click="closePaymentMethod"
                >
                    <el-button icon="el-icon-back" type="mini"></el-button>
                </div>
                <div class="pt-1">
                    <span class="font-bold">Ödeme Ekranı</span>
                </div>
            </div>
        </template>

        <template #content>
            <div class="mt-4">
                <div class="row" v-if="activePaymentMethod === null">
                    <div class="col-md-4 col-sm-12">
                        <div
                            @click="openPaymentMethod('papara')"
                            class="
                                hover:bg-gray-100
                                active:bg-gray-300
                                rounded
                                border
                                flex
                                items-center
                                justify-center
                                flex-col
                                h-full
                                p-6
                                cursor-pointer
                            "
                        >
                            <img src="/images/papara.svg" class="w-2/3" />
                            <h6 class="text-[#292929] pt-3 font-bold">
                                Papara
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div
                            @click="openPaymentMethod('bank')"
                            class="
                                hover:bg-gray-100
                                active:bg-gray-300
                                rounded
                                border
                                flex
                                items-center
                                justify-center
                                flex-col
                                h-full
                                p-6
                                cursor-pointer
                            "
                        >
                            <img
                                src="/images/bank-transaction.png"
                                class="w-1/2"
                            />
                            <h6 class="text-[#292929] pt-3 font-bold">
                                EFT veya Havale
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div
                            @click="openPaymentMethod('bitcoin')"
                            class="
                                hover:bg-gray-100
                                active:bg-gray-300
                                rounded
                                border
                                flex
                                items-center
                                justify-center
                                flex-col
                                h-full
                                cursor-pointer
                            "
                        >
                            <img src="/images/bitcoin.png" class="w-1/3" />
                            <h6 class="text-[#292929] pt-3 font-bold">
                                Bitcoin Wallet
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="row" v-else>
                    <div class="col-md-12 pb-4">
                        <el-alert
                            show-icon
                            v-if="!madePaymentVisible"
                            title="Bilgilendirme"
                            description="Ödeme bilgilerine gerekli ödemeyi yaptıktan sonra 'Ödeme Yaptım' butonuna bastıktan sonra ödeme bilgilerini detay ve saat bilgileriyle girmeniz gerekmektedir."
                            type="info"
                            :closable="false"
                        ></el-alert>
                    </div>
                    <div
                        class="col-md-12"
                        v-if="activePaymentMethod === 'papara'"
                    >
                        <div class="w-full flex justify-center">
                            <img src="/images/papara.svg" class="w-1/4" />
                        </div>
                        <div
                            class="row text-lg space-y-2"
                            v-if="!madePaymentVisible"
                        >
                            <div class="form-group">
                                <label class="text-lg">Hesap adı</label>
                                <el-input
                                    v-model="
                                        paymentSettings.papara_account_name
                                    "
                                    @focus="selectAndCopy"
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label class="text-lg">Hesap numarası</label>
                                <el-input
                                    v-model="
                                        paymentSettings.papara_account_number
                                    "
                                    @focus="selectAndCopy"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="row text-lg space-y-2" v-else>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="text-lg">Hesap adı</label>
                                    <el-input
                                        v-model="paymentForm.papara.name"
                                        placeholder="YUNUS EMRE ÖZTÜRK"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <label class="text-lg">Ödeme Zamanı</label>
                                    <el-input
                                        v-model="paymentForm.papara.date"
                                        placeholder="26.06.2021 9.41"
                                        v-maska="'##.##.#### ##.##'"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-md-12"
                        v-if="activePaymentMethod === 'bank'"
                    >
                        <div class="w-full flex justify-center">
                            <img
                                src="/images/bank-transaction.png"
                                class="w-1/6"
                            />
                        </div>
                        <div
                            class="row text-lg space-y-2"
                            v-if="!madePaymentVisible"
                        >
                            <div class="form-group">
                                <label class="text-lg">Hesap adı</label>
                                <el-input
                                    v-model="paymentSettings.bank_account_name"
                                    @focus="selectAndCopy"
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label class="text-lg">Hesap numarası</label>
                                <el-input
                                    v-model="paymentSettings.bank_account_iban"
                                    @focus="selectAndCopy"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="row text-lg space-y-2" v-else>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="text-lg">Hesap adı</label>
                                    <el-input
                                        v-model="paymentForm.bank.number"
                                        placeholder="YUNUS EMRE ÖZTÜRK"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <label class="text-lg">Ödeme Zamanı</label>
                                    <el-input
                                        v-model="paymentForm.bank.date"
                                        placeholder="26.06.2021 9.41"
                                        v-maska="'##.##.#### ##.##'"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-md-12"
                        v-if="activePaymentMethod === 'bitcoin'"
                    >
                        <div class="w-full flex justify-center items-center">
                            <img src="/images/bitcoin.png" class="w-1/6" />
                            <span>
                                <b>Ağ Adı:</b>
                                {{
                                    paymentSettings.bitcoin_wallet_network_name
                                }}
                            </span>
                        </div>
                        <div
                            class="row text-lg space-y-2 pt-4"
                            v-if="!madePaymentVisible"
                        >
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <img
                                        src="/images/bitcoin-wallet-address-qr-code.png"
                                    />
                                </div>
                                <div class="col-md-9">
                                    <label class="text-lg">Cüzdan Adresi</label>
                                    <el-input
                                        v-model="
                                            paymentSettings.bitcoin_wallet_address
                                        "
                                        @focus="selectAndCopy"
                                        readonly
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row text-lg space-y-2" v-else>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="text-lg"
                                        >Hesap Cüzdan Kodu</label
                                    >
                                    <el-input
                                        v-model="paymentForm.bitcoin.wallet"
                                        placeholder="1319WhoivgSqedj38igdwsr7Ef1vbAEw91"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <label class="text-lg">Ödeme Zamanı</label>
                                    <el-input
                                        v-model="paymentForm.bitcoin.date"
                                        placeholder="26.06.2021 9.41"
                                        v-maska="'##.##.#### ##.##'"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <template #footer>
            <template v-if="madePaymentVisible">
                <jet-secondary-button
                    class="float-left"
                    @click="openPaymentMethod('papara')"
                    v-if="activePaymentMethod === 'papara'"
                >
                    <i class="el-icon-back mr-2"></i>
                    Papara BİLGİLERİ
                </jet-secondary-button>

                <jet-secondary-button
                    class="float-left"
                    @click="openPaymentMethod('bank')"
                    v-if="activePaymentMethod === 'bank'"
                >
                    <i class="el-icon-back mr-2"></i>
                    EFT veya Havale BİLGİLERİ
                </jet-secondary-button>

                <jet-secondary-button
                    class="float-left"
                    @click="openPaymentMethod('bitcoin')"
                    v-if="activePaymentMethod === 'bitcoin'"
                >
                    <i class="el-icon-back mr-2"></i>
                    BITCOIN WALLET BİLGİLERİ
                </jet-secondary-button>
            </template>

            <jet-secondary-button @click="closePaymentModal">
                İptal
            </jet-secondary-button>

            <template v-if="activePaymentMethod !== null">
                <jet-button
                    class="ml-2 mt-2 mt-md-0"
                    :disabled="sentPaymentProcessLoading"
                    v-if="sentPaymentVisible"
                    @click="sentPaymentProcess"
                >
                    Siparişi İşleme Al
                </jet-button>

                <jet-button class="ml-2" @click="madePayment" v-else>
                    Ödeme Yaptım
                </jet-button>
            </template>
        </template>
    </jet-dialog-modal>

    <jet-dialog-modal
        :show="cancelOrderVisible"
        @close="cancelOrderVisible = true"
    >
        <template #title>Sipariş İptali</template>

        <template #content>
            <div class="row mb-3">
                <div
                    class="col-md-4 flex"
                    v-for="(status, index) in cancelOrderStatusMessages"
                    v-bind:key="index"
                >
                    <el-check-tag
                        style="display: flex !important"
                        class="
                            w-full
                            p-2
                            py-4
                            flex
                            items-start
                            justify-center
                            space-x-2
                        "
                        @change="toggleCancelStatus(status.id)"
                        :checked="status.checked"
                    >
                        <div>{{ status.emoji }}</div>
                        <div>{{ status.message }}</div>
                    </el-check-tag>
                </div>
            </div>
            <vue-editor
                v-model="cancelOrderMessage"
                placeholder="Veya birkaç cümle ile belirtebilir misiniz?"
            ></vue-editor>
        </template>

        <template #footer>
            <jet-secondary-button @click="cancelMakeOrderVisible">
                İptal
            </jet-secondary-button>

            <jet-button
                class="ml-2"
                :disabled="orderCancelProcessing"
                @click="cancelOrder"
            >
                <span v-if="orderCancelProcessing">Sipariş İptal Ediliyor</span>
                <span v-else>Siparişi İptal Et</span>
            </jet-button>
        </template>
    </jet-dialog-modal>
</template>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import { VueEditor } from "vue3-editor";

import JetDialogModal from "@/Jetstream/DialogModal";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        AppLayout,
        VueEditor,
        JetDialogModal,
        JetSecondaryButton,
        JetButton,
    },

    props: {
        order: Object,
        user: Object,
        paymentSettings: Object,
        payment: Object,
        orderResult: Object,
        role: String,
        errors: Object,
    },

    data() {
        return {
            editTextVisible: false,
            makePaymentVisible: false,
            makeEditPaymentVisible: false,
            processing: false,
            editTextBefore: null,
            activePaymentMethod: null,
            madePaymentVisible: false,
            sentPaymentVisible: false,
            sentPaymentProcessLoading: false,
            paymentForm: {
                papara: {
                    name: null,
                    date: null,
                },
                bank: {
                    number: null,
                    date: null,
                },
                bitcoin: {
                    wallet: null,
                    date: null,
                },
            },
            cancelOrderVisible: false,
            cancelOrderMessage: "",
            orderCancelProcessing: false,
            cancelOrderStatusMessages: [
                {
                    id: 0,
                    message: "Gerek Kalmadı",
                    emoji: "🤷‍♀️",
                    checked: false,
                },
                {
                    id: 1,
                    message: "Beklenti Karşılamadı",
                    emoji: "😕",
                    checked: false,
                },
                {
                    id: 2,
                    message: "Fiyatı Yüksek",
                    emoji: "💸",
                    checked: false,
                },
            ],
        };
    },

    created() {
        this.editTextBefore = this.order.text;
        if (this.role === "payment" && this.order.status == 0) {
            this.makePaymentVisible = true;
        }
    },

    methods: {
        sentPaymentProcess() {
            this.$inertia.post(
                route("user.payment.store"),
                {
                    ...this.paymentForm[this.activePaymentMethod],
                    type: this.activePaymentMethod,
                    order_id: this.order.id,
                },
                {
                    onStart: () => {
                        this.sentPaymentProcessLoading = true;
                    },
                    onSuccess: () => {
                        this.$message({
                            type: "success",
                            message: "Siparişiniz işleme alınmıştır.",
                        });
                        this.closeMakeModal();
                    },
                    onError: () => {
                        this.$message({
                            type: "error",
                            message:
                                "Siparişinizin işleme alınması esnasında hata oluşmuştur. Tüm alanları kontrol ediniz.",
                        });
                    },
                    onFinish: () => {
                        this.sentPaymentProcessLoading = false;
                    },
                }
            );
        },

        openOrderLink(orderLink) {
            window.open(`${orderLink}`, "_blank");
        },

        sentPayment() {
            this.sentPaymentVisible = true;
        },

        madePayment() {
            this.madePaymentVisible = true;
            this.sentPaymentVisible = true;
        },

        async selectAndCopy(event) {
            event.target.select();
            document.execCommand("copy");

            this.$message({
                type: "success",
                message: "Kopyalandı!",
                duration: 600,
            });
        },

        closePaymentMethod() {
            this.activePaymentMethod = null;
            this.madePaymentVisible = false;
            this.sentPaymentVisible = false;
        },

        openPaymentMethod(method) {
            this.activePaymentMethod = method;
            this.madePaymentVisible = false;
        },

        closePaymentModal() {
            if (this.role === "payment") {
                this.$inertia.get(route("user.order.show", [this.order.id]));
            }
            this.makePaymentVisible = false;
        },

        closeEditModal() {
            this.makeEditPaymentVisible = false;
        },

        cancelMakeOrderVisible() {
            this.cancelOrderVisible = false;
        },

        closeModal() {
            this.order.text = this.editTextBefore;
            this.editTextVisible = false;
        },

        closeMakeModal() {
            this.makePaymentVisible = false;
        },

        update() {
            if (this.order.text.length > 0) {
                this.$inertia.post(
                    route("user.order.update", [this.order.id]),
                    this.order,
                    {
                        preserveScroll: true,
                        onStart: () => (this.processing = true),
                        onSuccess: () => {
                            this.$message({
                                type: "success",
                                message: "İşlem başarıyla tamamlandı.",
                            });
                        },
                        onFinish: () => {
                            this.processing = false;
                            this.closeModal();
                        },
                        onError: (errors) => {
                            this.$message({
                                type: "error",
                                dangerouslyUseHTMLString: true,
                                message:
                                    "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                    this.errorsToMessage(errors),
                            });
                            this.proccesing = false;
                        },
                    }
                );
            } else {
                this.processing = true;
                this.$message({
                    type: "error",
                    dangerouslyUseHTMLString: true,
                    message:
                        "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                        "Lütfen sipariş içeriği giriniz!",
                });
                this.processing = false;
            }
        },

        cancelOrder() {
            const hasStatus = this.cancelOrderStatusMessages.filter(
                (item) => item.checked === true
            );

            if (this.cancelOrderMessage.length === 0) {
                if (hasStatus.length > 0) {
                    this.$inertia.post(
                        route("user.order.cancel-order", [this.order.id]),
                        {
                            orderCancelMessage: this.orderCancelMessage ?? null,
                            cancelOrderStatusMessages:
                                this.cancelOrderStatusMessages,
                        },
                        {
                            preserveScroll: true,
                            onStart: () => (this.orderCancelProcessing = true),
                            onSuccess: () => {
                                this.$message({
                                    type: "success",
                                    message: "Sipariş başarıyla iptal edildi.",
                                });
                                this.$inertia.get(
                                    route("user.order.show", [this.order.id])
                                );
                            },
                            onFinish: () => {
                                this.orderCancelProcessing = false;
                                this.cancelMakeOrderVisible();
                            },
                            onError: (errors) => {
                                this.$message({
                                    type: "error",
                                    dangerouslyUseHTMLString: true,
                                    message:
                                        "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                        this.errorsToMessage(errors),
                                });
                                this.orderCancelProcessing = false;
                            },
                        }
                    );
                } else {
                    this.orderCancelProcessing = true;
                    this.$message({
                        type: "error",
                        dangerouslyUseHTMLString: true,
                        message:
                            "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                            "Lütfen iptal mesajı veya durumu seçiniz!",
                    });
                    this.orderCancelProcessing = false;
                }
            } else {
                this.$inertia.post(
                    route("user.order.cancel-order", [this.order.id]),
                    {
                        orderCancelMessage: this.cancelOrderMessage,
                        cancelOrderStatusMessages:
                            this.cancelOrderStatusMessages,
                    },
                    {
                        preserveScroll: true,
                        onStart: () => (this.orderCancelProcessing = true),
                        onSuccess: () => {
                            this.$message({
                                type: "success",
                                message: "Sipariş başarıyla iptal edildi.",
                            });
                            this.$inertia.get(
                                route("user.order.show", [this.order.id])
                            );
                        },
                        onFinish: () => {
                            this.orderCancelProcessing = false;
                            this.cancelMakeOrderVisible();
                        },
                        onError: (errors) => {
                            this.$message({
                                type: "error",
                                dangerouslyUseHTMLString: true,
                                message:
                                    "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                    this.errorsToMessage(errors),
                            });
                            this.orderCancelProcessing = false;
                        },
                    }
                );
            }
        },

        toggleCancelStatus(statusId) {
            this.cancelOrderStatusMessages.forEach((item) => {
                if (item.id === statusId) {
                    if (item.checked === false) {
                        item.checked = true;
                    } else {
                        item.checked = false;
                    }
                }
            });
        },

        againMakeOrder() {
            this.$inertia.post(
                route("user.order.update", [this.order.id]),
                { role: "restart" },
                {
                    preserveScroll: true,
                    onStart: () => (this.processing = true),
                    onSuccess: () => {
                        this.$message({
                            type: "success",
                            message: "İşlem başarıyla tamamlandı.",
                        });
                    },
                    onFinish: () => {
                        this.processing = false;
                        this.closeModal();
                    },
                    onError: (errors) => {
                        this.$message({
                            type: "error",
                            dangerouslyUseHTMLString: true,
                            message:
                                "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                this.errorsToMessage(errors),
                        });
                        this.proccesing = false;
                    },
                }
            );
        },
    },
};
</script>
