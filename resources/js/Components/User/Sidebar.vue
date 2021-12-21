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
      <img src="/assets/img/exxefy-logo-white.png" style="width: 85px" />
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
import NavItem from "@/Components/Sidebar/NavItem";
import NavTitle from "@/Components/Sidebar/NavTitle";

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
          tag: "nav-title",
          text: "GENEL",
        },
        {
          tag: "nav-item",
          text: "Ürünler",
          url: "user.product.index",
          icon: "fad fa-clone",
        },
        {
          tag: "nav-item",
          text: "Kategoriler",
          url: "user.category.index",
          icon: "fad fa-clipboard-list",
        },
        {
          tag: "nav-item",
          text: "Dükkan Yönetimi",
          url: "user.category.index",
          icon: "fas fa-briefcase",
        },
        {
          tag: "nav-item",
          text: "Tahsilatlar",
          url: "user.category.index",
          icon: "fad fa-child",
        },
        {
          tag: "nav-item",
          text: "Siparişler",
          url: "user.category.index",
          icon: "fad fa-shopping-cart",
        },
        {
          tag: "nav-item",
          text: "İadeler",
          url: "user.category.index",
          icon: "fas fa-undo-alt",
        },
        {
          tag: "nav-item",
          text: "Ödeme Ayarları",
          url: "user.category.index",
          icon: "fad fa-money-bill-wave",
        },
        {
          tag: "nav-title",
          text: "PROFİL",
        },
        // {
        //   tag: "nav-item",
        //   text: "Müşteri Destek",
        //   url: "user.order.index",
        //   icon: "fad fa-envelope",
        // },
        // {
        //   tag: "nav-item",
        //   text: "Canlı Destek",
        //   url: "user.dashboard.index",
        //   icon: "fad fa-headset",
        // },
        {
          tag: "nav-item",
          text: "Hesap Bilgilerim",
          url: "user.setting",
          icon: "fad fa-user-circle",
        },
        {
          tag: "nav-item",
          text: "Çıkış Yap",
          url: "logout",
          icon: "fad fa-sign-out",
        },
      ],
    };
  },
};
</script>
