<template>
    <app-layout title="Ürün Galerisi">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('user.product.index'))
                " title="Geri" :content="product.title + ' Galeri'">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            Ürün Galerisi
                            <el-button type="success" class="float-right" icon="el-icon-plus" v-on:click="
                                $inertia.get(route('user.product.gallery.create', { id: product.id }))
                            " size="mini">
                                Resim Ekle
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
                                <el-table-column prop="order" label="Sıra"></el-table-column>
                                <el-table-column label="İşlem" width="300">
                                    <template #default="scope">
                                        <el-button icon="el-icon-edit" size="mini" v-on:click="
                                            $inertia.get(
                                                route('user.product.gallery.edit', {
                                                    productId: product.id,
                                                    galleryId: scope.row.id,
                                                })
                                            )
                                        ">Düzenle</el-button>
                                        <el-button type="danger" icon="el-icon-delete" size="mini" v-on:click="
                                            confirmDelete(
                                                [product.id, scope.row.id],
                                                'user.product.gallery.destroy',
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
import AppLayout from "@/Layouts/AppUserLayout";

export default {
    components: {
        AppLayout,
    },
    props: {
        data: Object,
        product: Object
    },
    methods: {
        goBack() {
            console.log("go back");
        },
    },
    data() {
        return {
            routeName: "user.product.index",
            deleteMessage:
                "Seçtiğiniz görsel silinecek. Devam etmek istiyor musunuz?",
        };
    },
};
</script>
