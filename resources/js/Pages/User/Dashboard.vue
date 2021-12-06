<template>
  <app-layout title="Stok Görselleri">
    <div class="row">
      <div class="col-sm-12 col-lg-12 col-md-12">

            <el-steps :active="1" finish-status="success" simple style="margin-top: 20px">
            <el-step title="Step 1" ></el-step>
            <el-step title="Step 2" ></el-step>
            <el-step title="Step 3" ></el-step>
            </el-steps>

      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppUserLayout'

export default {
  components: {
    AppLayout,
  },
}
</script>
