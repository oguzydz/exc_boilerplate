<template>
    <div class="tab-pane fade active show preview">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a class="" href="/user/dashboard">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kontrol Paneli
                </li>
            </ol>
        </nav>
    </div>
    <div class="header-divider mb-4"></div>
</template>

<script>
export default {
    props: {
        title: String,
    },
};
</script>

<style scoped>
.breadcrumb-item a {
    color: #01358D;
}

.breadcrumb-item {
    font-size: 12px;
    font-weight: bold;
}
</style>
