<template>
  <div
    :class="
      drawerMenuVisible === true
        ? 'sidebar sidebar-dark sidebar-lg-show sidebar-fixed sidebar-minimized'
        : 'sidebar sidebar-dark sidebar-fixed'
    "
    :style="drawerMenuVisible === true ? 'width:16rem;' : 'width: 0rem;'"
    id="sidebar"
  >
    <div
      v-if="drawerMenuVisible"
      class="sidebar-brand d-lg-down-none p-2 justify-center items-center"
    >
      <img src="/assets/img/exxefylogo.png" style="width: 85px;" />
    </div>
    <ul
      class="sidebar-nav sidebar-scroll scrollbar"
      id="scroll-style"
      data-coreui="navigation"
    >
      <div v-for="(nav, index) in navs" v-bind:key="index">
        <component
          :is="nav.tag"
          :icon="nav.icon ?? nav.icon"
          :url="nav.url ?? nav.url"
          :badge="nav.badge ?? nav.badge"
        >
          {{ nav.text }}
        </component>
      </div>
    </ul>
  </div>
</template>
<script>
import NavItem from '@/Components/Sidebar/NavItem'
import NavTitle from '@/Components/Sidebar/NavTitle'

export default {
  components: {
    NavItem,
    NavTitle,
  },

  props: {
    toggleDrawerMenu: Function,
    drawerMenuVisible: Boolean,
    drawerMenuFoldable: Boolean,
  },

  data() {
    return {
      navs: [
        {
          tag: 'nav-item',
          text: 'Panel',
          url: 'admin.index',
          icon: 'fad fa-chart-line',
        },
        {
          tag: 'nav-item',
          text: 'Kategoriler',
          url: 'admin.category.index',
          icon: 'fad fa-clipboard-list',
        },
        {
          tag: 'nav-item',
          text: 'Ürünler',
          url: 'admin.product.index',
          icon: 'fad fa-clone',
        },
        {
          tag: 'nav-item',
          text: 'Blog',
          url: 'admin.blog.index',
          icon: 'fas fa-blog',
        },
        {
          tag: 'nav-item',
          text: 'Müşteriler',
          url: 'admin.customer.index',
          icon: 'fad fa-child',
        },
        {
          tag: 'nav-title',
          text: 'TİCARET',
        },
        {
          tag: 'nav-item',
          text: 'Siparişler',
          url: 'admin.order.index',
          icon: 'fad fa-shopping-cart',
        },
        {
          tag: 'nav-item',
          text: 'Ödeme Ayarları',
          url: 'admin.payment-setting.index',
          icon: 'fad fa-money-bill-wave',
        },
        {
          tag: 'nav-item',
          text: 'Kasa',
          url: 'admin.index',
          icon: 'fad fa-cash-register',
        },
        {
          tag: 'nav-title',
          text: 'DESTEK',
        },
        {
          tag: 'nav-item',
          text: 'Müşteri Destek',
          url: 'admin.index',
          icon: 'fad fa-envelope',
        },
        {
          tag: 'nav-item',
          text: 'Canlı Destek',
          url: 'admin.index',
          icon: 'fad fa-headset',
        },
        {
          tag: 'nav-item',
          text: 'Çıkış Yap',
          url: 'logout',
          icon: 'fad fa-sign-out',
        },
      ],
    }
  },
}
</script>
