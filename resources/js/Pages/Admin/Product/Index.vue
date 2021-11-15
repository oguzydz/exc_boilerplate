<template>
    <app-layout>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ pluralText(name) }}
                        <el-button
                            type="success"
                            class="float-right"
                            icon="el-icon-plus"
                            @click="$inertia.get(route(`${routeName}.create`))"
                            size="mini"
                        >
                            {{ name }} Oluştur
                        </el-button>
                    </div>
                    <div class="card-body">
                        <el-table :data="data.data" class="w-full">
                            <el-table-column
                                prop="id"
                                label="#"
                                width="45"
                            ></el-table-column>
                            <el-table-column label="Görsel" width="120">
                                <template #default="scope">
                                    <img
                                        class="rounded"
                                        :src="`/storage/${scope.row.image}`"
                                        @error="imageUrlAlt"
                                    />
                                </template>
                            </el-table-column>
                            <el-table-column
                                prop="title"
                                label="Başlık"
                            ></el-table-column>
                            <el-table-column
                                prop="slug"
                                label="URL"
                            ></el-table-column>
                            <el-table-column label="Seçenekler" align="right">
                                <template #default="scope">
                                    <el-button
                                        type="primary"
                                        icon="el-icon-arrow-right"
                                        size="mini"
                                        v-on:click="
                                            $inertia.get(
                                                route(
                                                    'admin.product.feature.index',
                                                    {
                                                        id: scope.row.id,
                                                    }
                                                )
                                            )
                                        "
                                    >
                                    </el-button>

                                    <el-button
                                        type="primary"
                                        icon="el-icon-edit"
                                        size="mini"
                                        @click="
                                            $inertia.get(
                                                route(`${routeName}.edit`, [
                                                    scope.row.id,
                                                ])
                                            )
                                        "
                                    ></el-button>
                                    <el-button
                                        type="danger"
                                        icon="el-icon-delete"
                                        size="mini"
                                        @click="
                                            confirmDelete(
                                                scope.row.id,
                                                routeName
                                            )
                                        "
                                    ></el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <el-pagination
                            background
                            class="float-right my-6"
                            layout="prev, pager, next"
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
import AppLayout from "@/Layouts/AppAdminLayout";

export default {
    components: {
        AppLayout,
    },

    props: {
        data: Object,
    },

    data() {
        return {
            routeName: "admin.product",
            name: "Ürün",
        };
    },
};
</script>
