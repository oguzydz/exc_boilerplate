<template>
    <header class="header header-sticky mb-4 bg-[#6610f]">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <InertiaLink
                        :href="route('user.dashboard.index')"
                        class="header-brand d-lg-none float-left"
                    >
                        <img src="/assets/img/exxefy-logo.png" class="m-logo"/>
                    </InertiaLink>
                </div>
                <div class="col-6 m-auto">
                    <button
                        class="float-right"
                        type="button"
                        v-on:click="toggleDrawerMenu"
                    >
                        <svg class="icon icon-lg fill-current text-[#6610f]">
                            <use
                                xlink:href="@coreui/icons/sprites/free.svg#cil-menu"
                            ></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
export default {
    props: {
        toggleDrawerMenu: Function,
        drawerMenuVisible: Boolean,
    },
};
</script>
<style>
.header > .container-fluid {
    display: unset!important;
    min-height: unset!important;
}

.m-logo {
    width: 96px;
}
</style>
