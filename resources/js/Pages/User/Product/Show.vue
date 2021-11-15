<template>
    <app-layout :title="`${product.title}`">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body space-y-3">
                        <div class="row">
                            <div class="col-md-8 space-y-6 col-sm-12">
                                <h4>
                                    {{ product.title }}
                                </h4>
                                <el-breadcrumb
                                    separator-class="el-icon-arrow-right"
                                >
                                    <el-breadcrumb-item>
                                        <inertia-link
                                            :href="route('user.product.index')"
                                            method="GET"
                                        >
                                            Ürünler
                                        </inertia-link>
                                    </el-breadcrumb-item>
                                    <el-breadcrumb-item>
                                        <inertia-link
                                            :href="
                                                route('user.category.show', {
                                                    categorySlug:
                                                        product.category.slug,
                                                })
                                            "
                                            method="GET"
                                        >
                                            {{ product.category.title }}
                                        </inertia-link>
                                    </el-breadcrumb-item>
                                    <el-breadcrumb-item>{{
                                        product.title
                                    }}</el-breadcrumb-item>
                                </el-breadcrumb>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 m-auto">
                                        <swiper
                                            :style="{
                                                '--swiper-navigation-color':
                                                    '#fff',
                                                '--swiper-pagination-color':
                                                    '#fff',
                                            }"
                                            :loop="true"
                                            :spaceBetween="10"
                                            :navigation="true"
                                            class="mySwiper2"
                                        >
                                            <swiper-slide>
                                                <img
                                                    :src="`/storage/${product.image}`"
                                                    class="rounded"
                                                />
                                            </swiper-slide>
                                        </swiper>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="mt-2 mt-md-0">
                                            {{ product.title }}
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
                                                    product.discount_price
                                                }}
                                                TL</sup
                                            >
                                            {{ product.price }}
                                            TL
                                        </div>
                                        <p
                                            class="text-sm mt-2"
                                            v-html="product.text"
                                        ></p>
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
                                                {{ product.delivery_time }}
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button
                                                    style="
                                                        background-color: #564fd0 !important;
                                                        border-color: #564fd0 !important;
                                                    "
                                                    class="
                                                        btn btn-success
                                                        shadow
                                                        text-white text-base
                                                        py-2
                                                    "
                                                    @click="
                                                        $inertia.get(
                                                            route(
                                                                'user.order.create',
                                                                {
                                                                    product:
                                                                        product.slug,
                                                                }
                                                            )
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="
                                                            fad
                                                            fa-shopping-cart
                                                            pr-1
                                                        "
                                                    ></i>
                                                    Hemen Sipariş Ver
                                                </button>
                                                <button
                                                    @click="whatsappOrder"
                                                    class="
                                                        btn btn-success
                                                        shadow
                                                        bg-[#25D366]
                                                        border-[#075E54]
                                                        text-white text-base
                                                        py-2
                                                        ml-2 ml-sm-0
                                                        mt-2 mt-md-0
                                                    "
                                                >
                                                    <i
                                                        class="
                                                            fab
                                                            fa-whatsapp
                                                            pr-1
                                                        "
                                                    ></i>
                                                    Whatsapp Sipariş Hattı
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
</template>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import { Swiper, SwiperSlide } from "swiper/vue";
import SwiperCore, { Navigation, Thumbs } from "swiper/core";

import "@/Styles/swiper.css";
import "swiper/swiper-bundle.css";
import "swiper/components/navigation/navigation.min.css";
import "swiper/components/thumbs/thumbs.min.css";

SwiperCore.use([Navigation, Thumbs]);

export default {
    components: {
        AppLayout,
        Swiper,
        SwiperSlide,
    },
    props: {
        product: Object,
        paymentSetting: Object,
        user: Number,
    },
    data() {
        return {
            thumbsSwiper: null,
        };
    },
    methods: {
        whatsappOrder() {
            const message = `${this.paymentSetting.whatsapp_text} %0aKullanıcı Kimliği: ${this.user} %0aÜrün: exxestock.com/user/products/${this.product.slug}`;
            window.open(
                `https://wa.me/${this.paymentSetting.whatsapp}?text=${message}`,
                "_blank"
            );
        },
    },
};
</script>

<style></style>
