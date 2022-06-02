<template>
    <app-layout>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fad fa-shopping-cart"></i>
                        Siparişlerim
                    </div>
                    <div class="card-body">
                        <el-table :data="data.data" class="w-full">
                            <el-table-column type="expand">
                                <template #default="props">
                                    <p>
                                        <strong>Durum: </strong>
                                        <el-tag
                                            class="mr-2"
                                            effect="plain"
                                            :size="
                                                orderStatus(props.row.status)
                                                    .tag
                                            "
                                        >
                                            {{
                                                orderStatus(props.row.status)
                                                    .title
                                            }}
                                        </el-tag>
                                    </p>
                                    <p>
                                        <strong>Oluşturulma Zamanı: </strong>
                                        {{
                                            $moment(props.row.created_at)
                                                .subtract(-3, "hours")
                                                .fromNow()
                                        }}
                                    </p>
                                    <p>
                                        <strong>Güncelleme Zamanı: </strong>
                                        {{
                                            $moment(props.row.updated_at)
                                                .subtract(-3, "hours")
                                                .fromNow()
                                        }}
                                    </p>
                                </template>
                            </el-table-column>

                            <el-table-column
                                prop="product.title"
                                label="Ürün Adı"
                            ></el-table-column>
                            <el-table-column label="Seçenekler" align="right">
                                <template #default="scope">
                                    <inertia-link
                                        method="get"
                                        class="mr-2"
                                        :data="{ role: 'payment' }"
                                        v-if="scope.row.status === 0"
                                        :href="
                                            route(`${routeName}.show`, [
                                                scope.row.id,
                                            ])
                                        "
                                    >
                                        <el-button type="success" size="mini" class="mb-2 mb-md-0">
                                            <i class="el-icon-bank-card"></i>
                                            Ödeme Yap
                                        </el-button>
                                    </inertia-link>

                                    <el-button
                                        type="warning"
                                        size="mini"
                                        @click="
                                            $inertia.get(
                                                route(`${routeName}.show`, [
                                                    scope.row.id,
                                                ])
                                            )
                                        "
                                    >
                                        <i class="el-icon-d-arrow-right"></i>
                                        <span v-if="scope.row.status !== 0">
                                            Görüntüle
                                        </span>
                                    </el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <el-pagination
                            background
                            class="float-right my-6"
                            layout="total, prev, pager, next"
                            @current-change="
                                (page) =>
                                    handlePagination(page, `${routeName}.index`)
                            "
                            :current-page="data.current_page"
                            :page-size="data.per_page"
                            :total="data.total"
                        ></el-pagination>
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
        data: Object,
    },

    data() {
        return {
            routeName: "user.order",
            name: "Sipariş",
        };
    },
};
</script>
