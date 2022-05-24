<template>
    <app-layout :title="status">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header @back="goBack" title="Geri" :content="status + ' Üyeler'">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">{{ status }} Üyeler</div>
                        <div class="card-body">
                            <el-table :data="data.data" style="width: 100%">
                                <el-table-column prop="id" label="#" width="45"></el-table-column>
                                <el-table-column prop="name" label="Kullanıcı Adı"></el-table-column>
                                <el-table-column prop="status_view" label="Durum"></el-table-column>
                                <el-table-column prop="created_at" label="Oluşturulma Tarihi"></el-table-column>
                                <el-table-column label="İşlem" width="200">
                                    <template #default="scope">
                                        <el-button icon="el-icon-right" size="mini" v-on:click="
                                            $inertia.get(
                                                route('admin.customer.show', {
                                                    userId: scope.row.id,
                                                })
                                            )
                                        ">Görüntüle</el-button>
                                    </template>
                                </el-table-column>
                            </el-table>
                            <el-pagination background class="float-right my-6" layout="prev, pager, next"
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
        status: String
    },
    methods: {
        goBack() {
            console.log("go back");
        },
    },
    data() {
        return {
            //
        };
    },
};
</script>
