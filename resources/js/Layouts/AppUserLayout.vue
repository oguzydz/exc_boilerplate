<template>
    <web-title :title="title" />
    <div :class="
        drawerMenuVisible === true && !isMobile()
            ? 'wrapper d-flex flex-column min-vh-100 bg-light'
            : 'd-flex flex-column min-vh-100 bg-light'
    ">
        <Sidebar :drawerMenuVisible="drawerMenuVisible" :toggleDrawerMenu="toggleDrawerMenu"
            :drawerMenuFoldable="drawerMenuFoldable" />
        <Header :drawerMenuVisible="drawerMenuVisible" :toggleDrawerMenu="toggleDrawerMenu"
            :drawerMenuFoldable="drawerMenuFoldable" />
        <main class="container-fluid sm:px-0" style="min-height: 100vh; padding-bottom: 50px">
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

<script>
import Footer from "@/Components/User/Footer";
import Sidebar from "@/Components/User/Sidebar";
import Header from "@/Components/User/Header";
import WebTitle from "@/Components/User/Title";

export default {
    components: {
        WebTitle,
        Footer,
        Sidebar,
        Header,
    },

    props: {
        title: String,
    },

    data() {
        return {
            drawerMenuVisible: true,
            drawerMenuFoldable: false,
        };
    },

    methods: {
        logout() {
            this.$inertia.post(route("logout"));
        },

        toggleDrawerMenu() {
            this.drawerMenuVisible = !this.drawerMenuVisible;
            console.log(this.drawerMenuVisible);
        },
        toggleDrawerMenuFoldable() {
            this.drawerMenuFoldable = !this.drawerMenuFoldable;
            console.log(this.drawerMenuFoldable);
        },
        isMobile() {
            if (
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                    navigator.userAgent
                )
            ) {
                return true;
            } else {
                return false;
            }
        },
        sidebarActive() {
            if (this.isMobile()) {
                this.drawerMenuVisible = false;
            }
        },
    },
    mounted: function () {
        this.$nextTick(this.sidebarActive());
    },
};

var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function () {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/630776ff37898912e965216d/1gbaihm3f';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();

</script>
<style>
.wrapper {
    padding-left: 256px;
    transition: padding-left 0.1s ease 0.1s;
}
</style>
