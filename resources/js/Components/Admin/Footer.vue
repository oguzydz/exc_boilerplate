<template>
  <footer class="footer bg-white">
    <p class="m-auto color-black mb-0 mt-0">
      Copyright 2022 All right reserved
      <InertiaLink :href="route('home')" target="blank">
        exxefy.com
      </InertiaLink>
      is the product of
      <InertiaLink href="https://exxecode.com" target="blank">
        Exxecode
      </InertiaLink>
    </p>
  </footer>
</template>
  <style>
.footer p {
    font-size: 13px;
}
.footer a {
    color: #01358D;
}
</style>
