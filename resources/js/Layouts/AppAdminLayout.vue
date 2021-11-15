<template>
  <div
    :class="
      drawerMenuVisible === true
        ? 'wrapper d-flex flex-column min-vh-100 bg-light'
        : 'd-flex flex-column min-vh-100 bg-light'
    "
  >
    <Sidebar
      :drawerMenuVisible="drawerMenuVisible"
      :toggleDrawerMenu="toggleDrawerMenu"
      :drawerMenuFoldable="drawerMenuFoldable"
    />
    <Header
      :drawerMenuVisible="drawerMenuVisible"
      :toggleDrawerMenu="toggleDrawerMenu"
      :drawerMenuFoldable="drawerMenuFoldable"
    />
    <main class="container-fluid sm:px-0" style="min-height: 100vh; padding-bottom: 50px;">
      <slot></slot>
    </main>
    <Footer />
  </div>
</template>

<script>
import Footer from '@/Components/Admin/Footer'
import Sidebar from '@/Components/Admin/Sidebar'
import Header from '@/Components/Admin/Header'

export default {
  components: {
    Footer,
    Sidebar,
    Header,
  },

  data() {
    return {
      drawerMenuVisible: true,
      drawerMenuFoldable: false,
    }
  },

  methods: {
    logout() {
      this.$inertia.post(route('logout'))
    },

    toggleDrawerMenu() {
      this.drawerMenuVisible = !this.drawerMenuVisible
      console.log(this.drawerMenuVisible)
    },
    toggleDrawerMenuFoldable() {
      this.drawerMenuFoldable = !this.drawerMenuFoldable
      console.log(this.drawerMenuFoldable)
    },
  },
}
</script>
<style>
.wrapper {
  padding-left: 256px;
  transition: padding-left 0.1s ease 0.1s;
}
</style>
