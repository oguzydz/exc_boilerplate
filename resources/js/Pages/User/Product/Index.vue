<template>
    <app-layout title="Ürünler">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h3>Ürünler</h3>
                <hr />
                <div class="row">
                    <div
                        v-for="(product, index) in products.data"
                        v-bind:key="index"
                        class="col-sm-12 col-md-3 my-2"
                    >
                        <div
                            class="
                                grid grid-cols-3 grid-rows-7 grid-flow-row
                                overflow-hidden
                                rounded
                                hover:shadow-xl
                                transition-shadow
                                duration-300
                                ease-in-out
                                border
                                position-relative
                            "
                        >
                            <div
                                class="
                                    position-absolute
                                    right-2
                                    top-2
                                    py-1
                                    px-3
                                    bg-[#f00]
                                    rounded-md
                                    shadow-md
                                    text-white
                                    font-bold
                                    text-2xl
                                    border-white
                                "
                            >
                                <sup class="line-through text-sm"
                                    >{{ product.discount_price }} TL</sup
                                >
                                {{ product.price }}
                                TL
                            </div>
                            <div class="col-span-4 row-span-3">
                                <inertia-link
                                    class="
                                        no-underline
                                        hover:underline
                                        text-white
                                    "
                                    :href="
                                        route('user.product.show', {
                                            product: product.slug,
                                        })
                                    "
                                    method="GET"
                                >
                                    <img
                                        :src="`/storage/${product.image}`"
                                        alt="Placeholder"
                                        class="object-cover h-48 w-full"
                                    />
                                </inertia-link>
                            </div>
                            <div class="col-span-3 row-span-1 bg-[#606266]">
                                <header
                                    class="
                                        flex
                                        items-start
                                        flex-column
                                        justify-between
                                        leading-tight
                                        p-2
                                        md:p-4
                                    "
                                >
                                    <h1 class="text-sm mb-0">
                                        <inertia-link
                                            class="
                                                no-underline
                                                hover:underline
                                                text-white
                                            "
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
                                    </h1>
                                    <h1 class="text-lg">
                                        <inertia-link
                                            class="
                                                no-underline
                                                hover:underline
                                                text-white
                                            "
                                            :href="
                                                route('user.product.show', {
                                                    product: product.slug,
                                                })
                                            "
                                            method="GET"
                                        >
                                            {{ product.title }}
                                        </inertia-link>
                                    </h1>
                                </header>
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

export default {
    components: {
        AppLayout,
    },
    props: {
        products: Object,
    },
};
</script>
