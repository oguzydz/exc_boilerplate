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
          <el-step title="Üyelik Bilgileri"></el-step>
          <el-step title="Banka Hesabı"></el-step>
          <el-step title="Satılan Ürün"></el-step>
          <el-step title="Tamamla"></el-step>
        </el-steps>
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
