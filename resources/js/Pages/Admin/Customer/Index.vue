<template>
    <app-layout>
        <div class="row">
            <div class="col-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.index'))
                " title="Geri" content="Üye Tipleri">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Üye Tipleri</div>
                    <div class="card-body">
                        <el-row :gutter="12">
                            <el-col :span="8" v-for="(status, index) in statuses" :key="index" class="mb-2">
                                <el-card shadow="always" v-on:click="
                                    $inertia.get(
                                        route('admin.customer.list', {
                                            id: index,
                                        })
                                    )
                                ">
                                    {{ status }}
                                </el-card>
                            </el-col>
                        </el-row>
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
        statuses: {},
    },

    data() {
        return {
            routeName: "admin.customer",
        };
    },

    mounted() { },
};
</script>
