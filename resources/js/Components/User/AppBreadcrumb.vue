<template>
    <div class="tab-pane fade active show preview">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="" href="/user/dashboard">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kontrol Paneli
                </li>
            </ol>
        </nav>
    </div>
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
    color: #01358D
}

</style>
