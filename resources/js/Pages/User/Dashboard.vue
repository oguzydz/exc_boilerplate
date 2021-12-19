<template>
    <app-layout title="Stok Görselleri">
        <page-title :title="title" />
        <div class="row">
            <div class="col-md-12">
                <el-steps
                    :active="active"
                    finish-status="success"
                    simple
                    style="margin-top: 20px"
                >
                    <div class="col-md-3">
                        <el-step title="Üyelik Bilgileri"></el-step>
                    </div>
                    <div class="col-md-3">
                        <el-step title="Banka Hesabı"></el-step>
                    </div>
                    <div class="col-md-3">
                        <el-step title="Satılan Ürün"></el-step>
                    </div>
                    <div class="col-md-3">
                        <el-step title="Tamamla"></el-step>
                    </div>
                </el-steps>
            </div>
            <div class="col-md-12">
                <div class="step-tab-content">
                    <div class="row" v-if="active === 0">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <el-form
                                :model="ruleForm"
                                :rules="rules"
                                ref="ruleForm"
                                label-width="120px"
                            >
                                <el-form-item label="Activity name" prop="name">
                                    <el-input
                                        v-model="ruleForm.name"
                                    ></el-input>
                                </el-form-item>
                                <el-form-item
                                    label="Activity zone"
                                    prop="region"
                                >
                                    <el-select
                                        v-model="ruleForm.region"
                                        placeholder="Activity zone"
                                    >
                                        <el-option
                                            label="Zone one"
                                            value="shanghai"
                                        ></el-option>
                                        <el-option
                                            label="Zone two"
                                            value="beijing"
                                        ></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Activity time" required>
                                    <el-col :span="11">
                                        <el-form-item prop="date1">
                                            <el-date-picker
                                                type="date"
                                                placeholder="Pick a date"
                                                v-model="ruleForm.date1"
                                                style="width: 100%"
                                            ></el-date-picker>
                                        </el-form-item>
                                    </el-col>
                                    <el-col class="line" :span="2">-</el-col>
                                    <el-col :span="11">
                                        <el-form-item prop="date2">
                                            <el-time-picker
                                                placeholder="Pick a time"
                                                v-model="ruleForm.date2"
                                                style="width: 100%"
                                            ></el-time-picker>
                                        </el-form-item>
                                    </el-col>
                                </el-form-item>
                                <el-form-item
                                    label="Instant delivery"
                                    prop="delivery"
                                >
                                    <el-switch
                                        v-model="ruleForm.delivery"
                                    ></el-switch>
                                </el-form-item>
                                <el-form-item label="Resources" prop="resource">
                                    <el-radio-group v-model="ruleForm.resource">
                                        <el-radio
                                            label="Sponsorship"
                                        ></el-radio>
                                        <el-radio label="Venue"></el-radio>
                                    </el-radio-group>
                                </el-form-item>
                                <el-form-item label="Activity form" prop="desc">
                                    <el-input
                                        type="textarea"
                                        v-model="ruleForm.desc"
                                    ></el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button
                                        type="primary"
                                        @click="submitForm('ruleForm')"
                                        >Create</el-button
                                    >
                                    <el-button @click="resetForm('ruleForm')"
                                        >Reset</el-button
                                    >
                                </el-form-item>
                            </el-form>
                        </div>
                    </div>
                </div>
            </div>
            <el-button style="margin-top: 12px" @click="next"
                >Next step</el-button
            >
        </div>
    </app-layout>
</template>

<style>
.el-step.is-simple .el-step__title {
    font-size: 12px;
}
.el-steps--simple {
    background: #ffffff;
    box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);
}
.step-tab-content {
    background: white;
    margin-top: 20px;
    padding: 35px;
    box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);
}
</style>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import PageTitle from "@/Components/User/PageTitle";

export default {
    components: {
        AppLayout,
        PageTitle,
    },

    data() {
        return {
            active: 0,
            title: "ÜCRETSİZ HESAP OLUŞTURUN",
            ruleForm: {
                name: "",
                region: "",
                date1: "",
                date2: "",
                delivery: false,
                type: [],
                resource: "",
                desc: "",
            },

            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input Activity name",
                        trigger: "blur",
                    },
                    {
                        min: 3,
                        max: 5,
                        message: "Length should be 3 to 5",
                        trigger: "blur",
                    },
                ],
                region: [
                    {
                        required: true,
                        message: "Please select Activity zone",
                        trigger: "change",
                    },
                ],
                date1: [
                    {
                        type: "date",
                        required: true,
                        message: "Please pick a date",
                        trigger: "change",
                    },
                ],
                date2: [
                    {
                        type: "date",
                        required: true,
                        message: "Please pick a time",
                        trigger: "change",
                    },
                ],
                type: [
                    {
                        type: "array",
                        required: true,
                        message: "Please select at least one activity type",
                        trigger: "change",
                    },
                ],
                resource: [
                    {
                        required: true,
                        message: "Please select activity resource",
                        trigger: "change",
                    },
                ],
                desc: [
                    {
                        required: true,
                        message: "Please input activity form",
                        trigger: "blur",
                    },
                ],
            },
        };
    },

    methods: {
        next() {
            if (this.active++ > 2) this.active = 0;
        },
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert("submit!");
                } else {
                    console.log("error submit!!");
                    return false;
                }
            });
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        },
    },
};
</script>
