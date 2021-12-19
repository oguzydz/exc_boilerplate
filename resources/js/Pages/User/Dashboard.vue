<template>
  <app-layout title="Stok Görselleri">
    <page-title :title="title" />
    <div class="row">
      <div class="col-sm-12 col-lg-12 col-md-12">
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

        <el-form v-if="active === 0">
        ...
        </el-form>

        <el-button style="margin-top: 12px;" @click="next">Next step</el-button>
      </div>
    </div>
  </app-layout>
</template>

<style>
.el-step.is-simple .el-step__title {
    font-size: 12px;
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
      title: 'ÜCRETSİZ HESAP OLUŞTURUN',
    };
  },

  methods: {
    next() {
      if (this.active++ > 2) this.active = 0;
    },
  },
};
</script>
