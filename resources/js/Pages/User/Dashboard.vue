<template>
  <app-layout title="Stok Görselleri">
    <div class="row">
      <div class="col-sm-12 col-lg-12 col-md-12">
        <el-steps
          :active="active"
          finish-status="success"
          simple
          style="margin-top: 20px"
        >
          <el-step title="Step 1"></el-step>
          <el-step title="Step 2"></el-step>
          <el-step title="Step 3"></el-step>
        </el-steps>
        <el-button style="margin-top: 12px;" @click="next">Next step</el-button>

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

  data() {
    return {
      active: 0,
    };
  },

  methods: {
    next() {
      if (this.active++ > 2) this.active = 0;
    },
  },
};
</script>
