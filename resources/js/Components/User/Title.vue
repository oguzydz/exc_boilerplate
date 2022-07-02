<template>
    <inertia-head :title="title ? `${title} - Exxefy` : 'Kullanıcı Paneli - Exxefy'">
        <slot />
    </inertia-head>
</template>

<script>
export default {
    props: {
        title: String,
    },
}
</script>
