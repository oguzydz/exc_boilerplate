<template>
    <app-layout title="Tamamlanan Siparişler">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="$inertia.get(route('user.index'))" title="Geri"
                    content="Tamamlanan Siparişler">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <el-tabs v-model="activeTabName" @tab-click="tabClick">
                        <el-tab-pane label="Aktif" name="index"></el-tab-pane>
                        <el-tab-pane label="Kargolandı/Gönderildi" name="shipped">
                        </el-tab-pane>
                        <el-tab-pane label="Tamamlandı" name="completed">
                            <div class="card">
                                <div class="card-header">
                                    Sipariş Listesi
                                    <el-input v-model="searchText" @change="this.elemeSearch(routeName, searchText)"
                                        size="mini" class="float-right" style="width:180px;margin-right:10px"
                                        placeholder="Sipariş ara!" />
                                </div>
                                <div class="card-body">
                                    <el-table :data="data.data" style="width: 100%">
                                        <el-table-column prop="id" label="#" width="45"></el-table-column>
                                        <el-table-column label="Müşteri">
                                            <template #default="scope">
                                                {{ scope.row.name + ' ' + scope.row.surname }}
                                            </template>
                                        </el-table-column>
                                        <el-table-column prop="email" label="E-Posta"></el-table-column>
                                        <el-table-column label="Toplam Ücret">
                                            <template #default="scope">
                                                {{ scope.row.total_price + ' TL' }}
                                            </template>
                                        </el-table-column>
                                        <el-table-column label="Kargo Ücreti">
                                            <template #default="scope">
                                                {{ scope.row.cargo_price + ' TL' }}
                                            </template>
                                        </el-table-column>
                                        <el-table-column prop="created_at" label="Oluşuturulma Tarihi">
                                        </el-table-column>
                                        <el-table-column prop="result.created_at" label="Gönderilme Tarihi">
                                        </el-table-column>
                                        <el-table-column label="İşlem" width="130">
                                            <template #default="scope">
                                                <el-button icon="el-icon-right" size="mini" v-on:click="
                                                    $inertia.get(
                                                        route('user.order.show', {
                                                            id: scope.row.id,
                                                        })
                                                    )
                                                ">Görüntüle</el-button>
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
                        <el-tab-pane label="İptal Edildi" name="cancelled"></el-tab-pane>
                        <el-tab-pane label="Diğer" name="other"></el-tab-pane>
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
            this.$inertia.get(route('user.order.' + tab.paneName))
        }
    },
    data() {
        return {
            activeTabName: 'completed',
            searchText: this.getUrlQuery('search'),
            routeName: "user.order.completed",
            deleteMessage:
                "Siparişü silerek pasife alınmış Yeni Siparişler durumuna göndereceksiniz. Devam etmek istiyor musunuz?",
        };
    },
};
</script>
