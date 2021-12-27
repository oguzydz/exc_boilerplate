<template>
<app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-bold">
                    <el-button type="primary" class="mr-2" icon="el-icon-back" v-on:click="$inertia.get(route('admin.newcustomer.show', [data.id]))" size="mini">
                        Müşteri
                    </el-button>

                    Başvuru Reddetme
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-2">
                            <label>Açıklama</label>
                            <vue-editor v-model="form.text"></vue-editor>
                        </div>
                        <button class="btn btn-success text-white float-right mt-2" @click="create(form)" type="button">
                            Kaydet
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppAdminLayout'
import { VueEditor } from 'vue3-editor'

export default {
    components: {
        AppLayout,
        VueEditor,
    },
    props: {
        data: {},
        errors: {}
    },
    data() {
        return {
            form: {
                text: null,
            },
        }
    },

    methods: {
        create(data) {
            data._method = 'POST';
            this.$inertia.post(route('admin.newcustomer.cancelStore', [this.data.id]), data, {
                onSuccess: page => {
                    this.$message({
                        type: 'success',
                        message: 'İşlem başarıyla tamamlandı.',
                    })
                    this.$inertia.get(route('admin.newcustomer.show', [this.data.id]))
                },
                onError: errors => {
                    this.$message({
                        type: 'error',
                        dangerouslyUseHTMLString: true,
                        message: 'Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>' + this.errorsToMessage(errors),
                    })
                },
            })
        },
    },
}
</script>
