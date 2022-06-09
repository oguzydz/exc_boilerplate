<template>
    <app-layout title="Ürünler">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.index'))
                " title="Geri" content="İletişim Mesajları">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            İletişim Mesajları
                            <el-input v-model="searchText" @change="this.elemeSearch(routeName, searchText)" size="mini"
                                class="float-right" style="width:180px;margin-right:10px"
                                placeholder="Ad-soyad ile ara!" />
                        </div>
                        <div class="card-body">
                            <el-table :data="data.data" style="width: 100%">
                                <el-table-column prop="id" label="#" width="45"></el-table-column>
                                <el-table-column prop="name" label="Ad-Soyad"></el-table-column>
                                <el-table-column prop="text" label="Konu Başlığı"></el-table-column>
                                <el-table-column prop="email" label="E-posta"></el-table-column>
                                <el-table-column label="İşlem" width="300">
                                    <template #default="scope">
                                        <el-button icon="el-icon-right" size="mini" v-on:click="
                                            $inertia.get(
                                                route('admin.contact.show', {
                                                    id: scope.row.id,
                                                })
                                            )
                                        ">Görüntüle</el-button>
                                        <el-button type="danger" icon="el-icon-delete" size="mini" v-on:click="
                                            confirmDelete(
                                                scope.row.id,
                                                'admin.contact.destroy',
                                                deleteMessage
                                            )
                                        ">
                                            Sil
                                        </el-button>
                                    </template>
                                </el-table-column>
                            </el-table>
                            <el-pagination background class="float-right my-6" layout="total, prev, pager, next"
                                @current-change="
                                    (page) => handlePagination(page, routeName)
                                " :current-page="data.current_page" :page-size="data.per_page" :total="data.total">
                            </el-pagination>
                        </div>
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
    methods: {
        goBack() {
            console.log("go back");
        },
    },
    data() {
        return {
            searchText: this.getUrlQuery('search'),
            routeName: "admin.contact.index",
            deleteMessage: "İletişim mesajını silmek istiyor musunuz?",
        };
    },
};
</script>
