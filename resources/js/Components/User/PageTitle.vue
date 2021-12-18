<template>
    <div class="row">
        <div class="col-md-12">
            <h6 class="page-title">{{ title }}</h6>
        </div>
    </div>
</template>

<script>
export default {
  props: {
    title: String,
  },
}
</script>

<style scoped>
.page-title {
    font-size: 12px;
    font-weight: bold;
}
</style>
