<template>
  <app-admin-layout>
    <div class="container-lg">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary pb-4">
            <div
              class="card-body pb-0 d-flex justify-content-between align-items-start"
            >
              <div>
                <div class="fs-4 fw-semibold">{{ order }}</div>
                <div class="text-2xl" v-on:click="$inertia.get(route('admin.order.index'))">Siparişler</div>
              </div>
              <div class="dropdown text-2xl" style="font-size: 50px;">
                <i class="bx bx-news"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-info pb-4">
            <div
              class="card-body pb-0 d-flex justify-content-between align-items-start"
            >
              <div>
                <div class="fs-4 fw-semibold">{{ userCount }}</div>
                <div class="text-2xl" v-on:click="$inertia.get(route('admin.customer.index'))">Müşteriler</div>
              </div>
              <div class="dropdown text-2xl" style="font-size: 50px;">
                <i class="bx bxs-network-chart"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-warning pb-4">
            <div
              class="card-body pb-0 d-flex justify-content-between align-items-start"
            >
              <div>
                <div class="fs-4 fw-semibold">{{ product }}</div>
                <div class="text-2xl" v-on:click="$inertia.get(route('admin.product.index'))">Ürün Sayısı</div>
              </div>
              <div class="dropdown text-2xl" style="font-size: 50px;">
                <i class="bx bxl-youtube"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-danger pb-4">
            <div
              class="card-body pb-0 d-flex justify-content-between align-items-start"
            >
              <div>
                <div class="fs-4 fw-semibold">0</div>
                <div class="text-2xl">Destek Talepleri</div>
              </div>
              <div class="dropdown text-2xl" style="font-size: 50px;">
                <i class="bx bx-git-pull-request"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->

      <!-- /.card.mb-4-->



    </div>
  </app-admin-layout>
</template>

<script>
import AppAdminLayout from '@/Layouts/AppAdminLayout'

export default {
  components: {
    AppAdminLayout,
  },
  props: {
    userCount: Number,
    order : Number,
    product : Number
  },
}
</script>
