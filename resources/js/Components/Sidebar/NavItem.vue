<template>
  <li class="nav-item">
    <inertia-link
      class="nav-link w-full"
      as="button"
      type="button"
      :href="url === 'logout' ? route('logout') : route(url)"
      :method="url === 'logout' ? 'POST' : 'GET'"
    >
      <i :class="icon"></i>
      <span class="pl-2">
        <slot></slot>
      </span>
      <span
        v-if="badge"
        :class="`p-1 text-xs rounded ${badge.color} ${badge.class}`"
      >
        {{ badge.text }}
      </span>
    </inertia-link>
  </li>
</template>

<script>
export default {
  props: {
    icon: String,
    url: String,
    badge: Object,
  },

  methods: {
    logout() {
      this.$inertia.post(route('logout'), {
        onSuccess: () => (window.location.href = '/'),
      })
    },
  },
}
</script>
