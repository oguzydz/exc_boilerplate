<template>
    <app-layout title="Komisyon Ücretlendirmeleri">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.index'))
                " title="Geri" content="Komisyon Ücretlendirmeleri">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            Komisyon Ücretlendirme Oranları
                        </div>
                        <div class="card-body">
                            <el-table :data="data.data" style="width: 100%">
                                <el-table-column label="Aylık Toplam Satış">
                                    <template #default="scope">
                                        {{ scope.row.price + ' TL' + ' - ' + scope.row.finish_price + ' TL' }}
                                    </template>
                                </el-table-column>
                                <el-table-column label="TL İşlem Ücreti">
                                    <template #default="scope">
                                        {{ ' %' + scope.row.local_processing_fee + ' + ' + scope.row.percent + ' TL' }}
                                    </template>
                                </el-table-column>
                                <el-table-column label="Döviz İşlem Ücreti">
                                    <template #default="scope">
                                        {{ ' %' + scope.row.foreign_proccessing_fee + ' + ' + scope.row.percent + ' TL'
                                        }}
                                    </template>
                                </el-table-column>

                                <el-table-column label="İşlem" width="300">
                                    <template #default="scope">
                                        <el-button icon="el-icon-right" size="mini" v-on:click="
                                            $inertia.get(
                                                route('user.commission.show', {
                                                    id: scope.row.id,
                                                })
                                            )
                                        ">Görüntüle</el-button>
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
            searchText: this.getUrlQuery('search'),
            routeName: "user.commission.index",
            deleteMessage: "İletişim mesajını silmek istiyor musunuz?",
        };
    },
};
</script>
