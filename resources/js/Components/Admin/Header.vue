<template>
  <header class="header header-sticky mb-4 bg-[#6610f]">
    <div class="container-fluid">
      <a class="header-brand d-lg-none" href="#" v>
        <img src="/img/core-img/exxestock-logo.png" style="width: 40%;" />
      </a>
      <button
        class="header-toggler order-sm-first px-md-0 me-md-3"
        type="button"
        v-on:click="toggleDrawerMenu"
      >
        <svg class="icon icon-lg fill-current text-[#6610f]">
          <use xlink:href="@coreui/icons/sprites/free.svg#cil-menu"></use>
        </svg>
      </button>
    </div>
  </header>
</template>
<script>
export default {
  props: {
    toggleDrawerMenu: Function,
    drawerMenuVisible: Boolean,
  },
}
</script>
