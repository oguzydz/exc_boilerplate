<template>
  <inertia-head :title="title ? `${title} - Exxefy` : 'Exxefy - Kullanıcı Paneli'">
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
