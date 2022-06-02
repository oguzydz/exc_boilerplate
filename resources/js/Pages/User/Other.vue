<template>
    <app-layout title="Hesabınız Askıya Alındı">
        <page-title title="HESABINIZ ASKIYA ALINDI" />
        <div class="row">
            <div class="col-md-12">
                <div class="step-tab-content">
                    <div class="row">
                        <div class="col-md-12 form-info-side text-center">
                            <div class="form-info">
                                <h3>Hesabınız Askıya Alındı!</h3>
                                <p class="text-information">
                                    {{ userPasive.text }}
                                </p>
                                <img src="/assets/img/blocked.jpg" class="img" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppUserLayout";
import PageTitle from "@/Components/User/PageTitle";

export default {
    components: {
        AppLayout,
        PageTitle,
    },
    props: {
        userPasive: {},
    },
    data() {
        return {
            //
        };
    },

    methods: {
        //
    },
};
</script>

<style>
.img {
    width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.step-tab-content {
    background: white;
    margin-top: 20px;
    padding: 35px;
    box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);
}

.text-information {
    font-size: 14px;
    color: gray;
}

.el-form-item__label {
    font-size: 13px;
}

.el-button [class*="el-icon-"]+span {
    font-weight: bold;
}
</style>
