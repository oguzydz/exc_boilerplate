<template>
    <app-layout title="Bloglar">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.index'))
                " title="Geri" content="Blog"> </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            Blog Listesi
                            <el-button type="success" class="float-right" icon="el-icon-plus" v-on:click="
                                $inertia.get(route('admin.blog.create'))
                            " size="mini">
                                Blog Oluştur
                            </el-button>
                        </div>
                        <div class="card-body">
                            <el-table :data="data.data" style="width: 100%">
                                <el-table-column prop="id" label="#" width="45"></el-table-column>
                                <el-table-column label="Görsel" width="200">
                                    <template #default="scope">
                                        <img :src="'/storage/' + scope.row.image" class="w-50" @error="imageUrlAlt" />
                                    </template>
                                </el-table-column>
                                <el-table-column prop="title" label="Başlık"></el-table-column>
                                <el-table-column label="İşlem" width="200">
                                    <template #default="scope">
                                        <el-button icon="el-icon-edit" size="mini" v-on:click="
                                            $inertia.get(
                                                route('admin.blog.edit', {
                                                    id: scope.row.id,
                                                })
                                            )
                                        ">Düzenle</el-button>
                                        <el-button type="danger" icon="el-icon-delete" size="mini"
                                            v-on:click="confirmDelete(scope.row.id, 'admin.blog.destroy', deleteMessage)">
                                            Sil
                                        </el-button>
                                    </template>
                                </el-table-column>
                            </el-table>
                            <el-pagination background class="float-right my-6" layout="total, prev, pager, next"
                                @current-change="handlePagination" :current-page="data.current_page"
                                :page-size="data.per_page" :total="data.total"></el-pagination>
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
            console.log('go back');
        }
    },
    data() {
        return {
            deleteMessage: "Blog silerek  pasife almış olacaksınız. Devam etmek istiyor musunuz?",
        };
    },
};
</script>
