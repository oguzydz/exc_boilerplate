<template>
    <app-layout title="Ürünler">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header @back="goBack" title="Geri" content=" İletişim Talepleri">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            İletişim Talepleri
                        </div>
                        <div class="card-body">
                            <el-table :data="data.data" style="width: 100%">
                                <el-table-column
                                    prop="id"
                                    label="#"
                                    width="45"
                                ></el-table-column>
                                <el-table-column
                                    prop="name"
                                    label="Başlık"
                                ></el-table-column>
                                <el-table-column label="İşlem" width="300">
                                    <template #default="scope">
                                        <el-button
                                            icon="el-icon-right"
                                            size="mini"
                                            v-on:click="
                                                $inertia.get(
                                                    route('user.contact.show', {
                                                        id: scope.row.id,
                                                    })
                                                )
                                            "
                                            >Görüntüle</el-button
                                        >
                                        <el-button
                                            type="danger"
                                            icon="el-icon-delete"
                                            size="mini"
                                            v-on:click="
                                                confirmDelete(
                                                    scope.row.id,
                                                    'user.contact.destroy',
                                                    deleteMessage
                                                )
                                            "
                                        >
                                            Sil
                                        </el-button>
                                    </template>
                                </el-table-column>
                            </el-table>
                            <el-pagination
                                background
                                class="float-right my-6"
                                layout="prev, pager, next"
                                @current-change="
                                    (page) => handlePagination(page, routeName)
                                "
                                :current-page="data.current_page"
                                :page-size="data.per_page"
                                :total="data.total"
                            ></el-pagination>
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
        data: Object,
    },
    methods: {
        goBack() {
            console.log("go back");
        },
    },
    data() {
        return {
            routeName: "user.contact.index",
            deleteMessage:
                "İletişim mesajını silmek istiyor musunuz?",
        };
    },
};
</script>



user_contacts_table

ContactController -> user panelde listelenecek, görüntüleecek ve silebilecek

web.php
