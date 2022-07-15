<template>
    <app-layout title="Pasif Ürünler">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="$inertia.get(route('user.index'))" title="Geri" content="Ürünler">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <el-tabs v-model="activeTabName" @tab-click="tabClick">
                        <el-tab-pane label="Aktif" name="index"></el-tab-pane>
                        <el-tab-pane label="Pasif" name="pasive">
                            <div class="card">
                                <div class="card-header">
                                    Pasif Ürün Listesi
                                    <el-button type="success" class="float-right" icon="el-icon-plus"
                                        v-on:click="$inertia.get(route('user.product.create'))" size="mini">
                                        Ürün Oluştur
                                    </el-button>
                                    <el-input v-model="searchText" @change="this.elemeSearch(routeName, searchText)"
                                        size="mini" class="float-right" style="width:180px;margin-right:10px"
                                        placeholder="Ürün adı ile ara!" />
                                </div>
                                <div class="card-body">
                                    <el-table :data="data.data" style="width: 100%">
                                        <el-table-column prop="id" label="#" width="45"></el-table-column>
                                        <el-table-column label="Görsel" width="200">
                                            <template #default="scope">
                                                <img :src="'/storage/' + scope.row.image" class="w-50"
                                                    @error="imageUrlAlt" />
                                            </template>
                                        </el-table-column>
                                        <el-table-column prop="title" label="Başlık"></el-table-column>
                                        <el-table-column prop="price" label="Fiyat"></el-table-column>
                                        <el-table-column prop="stock" label="Stok"></el-table-column>
                                        <el-table-column label="İşlem" width="320">
                                            <template #default="scope">
                                                <el-button icon="el-icon-camera" size="mini" v-on:click="
                                                    $inertia.get(
                                                        route('user.product.gallery.index', {
                                                            id: scope.row.id,
                                                        })
                                                    )
                                                ">Galeri</el-button>
                                                <el-button icon="el-icon-edit" size="mini" v-on:click="
                                                    $inertia.get(
                                                        route('user.product.edit', {
                                                            id: scope.row.id,
                                                        })
                                                    )
                                                ">Düzenle</el-button>
                                                <el-button type="success" icon="el-icon-finished" size="mini"
                                                    v-on:click="confirmActive(scope.row.id, 'user.product.retrieve', deleteMessage)">
                                                    Aktif Et
                                                </el-button>
                                            </template>
                                        </el-table-column>
                                    </el-table>
                                    <el-pagination background class="float-right my-6" layout="total, prev, pager, next"
                                        @current-change="(page) => handlePagination(page, routeName, {
                                            search: this.searchText
                                        })" :current-page="data.current_page" :page-size="data.per_page"
                                        :total="data.total">
                                    </el-pagination>
                                </div>
                            </div>
                        </el-tab-pane>
                    </el-tabs>
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
    methods: {
        tabClick(tab, event) {
            this.$inertia.get(route('user.product.' + tab.paneName))
        }
    },
    data() {
        return {
            activeTabName: 'pasive',
            searchText: this.getUrlQuery('search'),
            routeName: "user.product.pasive",
            deleteMessage:
                "Ürünü aktif durumuna göndereceksiniz. Devam etmek istiyor musunuz?",
        };
    },
};
</script>
