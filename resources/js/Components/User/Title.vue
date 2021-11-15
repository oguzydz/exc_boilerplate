<template>
  <inertia-head :title="title ? `${title} - Exxestock` : 'Exxestock - Kullanıcı Paneli'">
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
