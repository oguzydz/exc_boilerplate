<template>
    <app-layout title="Kullanıcı Pasife Alma">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <el-page-header v-on:click="
                    $inertia.get(route('admin.customer.show', { userId: data.id }))
                " title="Geri" content="Kullanıcı Pasife Alma">
                </el-page-header>
                <div class="header-divider mb-4"></div>
                <div class="card">
                    <div class="card-header">Kullanıcı Pasife Alma</div>
                    <div class="card-body">
                        <el-form :model="form" :rules="rules" ref="form" label-width="130px"
                            :label-position="isMobile() ? 'left' : 'right'" size="medium">
                            <el-form-item label="Açıklaması:" prop="text">
                                <el-input type="textarea" v-model="form.text" placeholder="Pasife alma sebebi giriniz.">
                                </el-input>
                            </el-form-item>
                            <div class="float-right">
                                <el-button type="success" icon="el-icon-check" @click="submitForm('form')">GÖNDER
                                </el-button>
                            </div>
                        </el-form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppAdminLayout";
import PageTitle from "@/Components/User/PageTitle";
import { VueEditor } from "vue3-editor";

export default {
    components: {
        AppLayout,
        VueEditor,
        PageTitle,
    },
    props: {
        data: {},
        errors: {},
    },

    data() {
        return {
            title: "Kullanıcı Pasife Alma",
            rules: {
                text: [
                    {
                        required: true,
                        message: "Lütfen ürün açıklaması giriniz.",
                        trigger: "blur",
                    },
                ],
            },
            form: {},
        };
    },

    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (formName == "form") {
                        this.$inertia.post(
                            route("admin.customer.pasiveStore", [this.data.id]),
                            this.form,
                            {
                                onSuccess: (page) => {
                                    this.$message({
                                        type: "success",
                                        message: "İşlem başarıyla tamamlandı.",
                                    });
                                    this.$inertia.get(route("admin.customer.show", [this.data.id]))
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
                    } else {
                        console.log("error submit!!");
                    }
                } else {
                    console.log("error submit!!");
                    return false;
                }
            });
        },
    },
};
</script>
