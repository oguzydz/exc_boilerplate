<template>
    <app-layout>
        <div class="row">
            <div class="col-12 py-3">
                <a :href="route('admin.blog.index')" target="_blank">
                    <el-button
                        type="primary"
                        class="float-right"
                        icon="el-icon-right"
                        size="mini"
                    >
                        Sitede görüntüle
                    </el-button>
                </a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Bloglar
                        <el-button
                            type="success"
                            class="float-right"
                            icon="el-icon-plus"
                            v-on:click="
                                $inertia.get(route('admin.blog.create'))
                            "
                            size="mini"
                        >
                            Blog Oluştur
                        </el-button>
                    </div>
                    <div class="card-body">
                        <el-table :data="data.data" style="width: 100%">
                            <el-table-column
                                prop="id"
                                label="#"
                                width="45"
                            ></el-table-column>
                            <el-table-column label="Görsel" width="200">
                                <template #default="scope">
                                    <img
                                        :src="'/storage/' + scope.row.image"
                                        class="w-50"
                                        @error="imageUrlAlt"
                                    />
                                </template>
                            </el-table-column>
                            <el-table-column
                                prop="title"
                                label="Başlık"
                            ></el-table-column>
                            <el-table-column label="Options" width="200">
                                <template #default="scope">
                                    <el-button
                                        type="primary"
                                        icon="el-icon-edit"
                                        size="mini"
                                        v-on:click="
                                            $inertia.get(
                                                route('admin.blog.edit', {
                                                    id: scope.row.id,
                                                })
                                            )
                                        "
                                    ></el-button>
                                    <el-button
                                        type="danger"
                                        icon="el-icon-delete"
                                        size="mini"
                                        v-on:click="confirmDelete(scope.row.id)"
                                    ></el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <el-pagination
                            background
                            class="float-right my-6"
                            layout="prev, pager, next"
                            @current-change="handlePagination"
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
import AppLayout from '@/Layouts/AppAdminLayout'

export default {
    components: {
        AppLayout,
    },

    props: {
        data: {},
    },

    methods: {
        imageUrlAlt(event) {
            event.target.src = "/img/placeholder.jpg";
        },

        confirmDelete(id) {
            this.$confirm(
                "Bu Blog'u silmek üzeresiniz, devam edecek misiniz?",
                "Uyarı",
                {
                    confirmButtonText: "OK",
                    cancelButtonText: "İptal",
                    type: "warning",
                }
            )
                .then(() => {
                    this.$inertia.post(
                        route("admin.blog.destroy", id),
                        {},
                        {
                            onSuccess: (page) => {
                                this.$message({
                                    type: "success",
                                    message: "İşlem başarıyla tamamlandı.",
                                });
                            },
                            onError: (errors) => {
                                this.$message({
                                    type: "error",
                                    dangerouslyUseHTMLString: true,
                                    message:
                                        "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                        this.errorsToMessage(errors),
                                });
                            },
                        }
                    );
                })
                .catch((e) => {
                    this.$message({
                        type: "info",
                        message: "Silme İptal Edildi!",
                    });
                });
        },
        handlePagination(page) {
            this.$inertia.get(
                this.route("admin.blog.index"),
                {
                    page: page,
                },
                {
                    onSuccess: (page) => {},
                }
            );
        },
        errorsToMessage(errors) {
            let $errorBag = [];
            Object.keys(errors).map(function (value, key) {
                $errorBag += errors[value] + "<br>";
            });

            return $errorBag;
        },
    },
};
</script>
