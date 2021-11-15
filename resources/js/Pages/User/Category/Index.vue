<template>
  <app-layout title="Ürün Kategorileri">
    <div class="row">
      <div class="col-md-12">
        <h3>Kategoriler</h3>
        <hr />
        <div class="row">
          <div
            v-for="(category, index) in categories"
            v-bind:key="index"
            class="col-sm-12 col-md-3 my-2"
          >
            <div
              class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded hover:shadow-xl transition-shadow duration-300 ease-in-out border position-relative"
            >
              <div class="col-span-3 row-span-4">
                <a target="_blank" :href="route('user.category.show', [category.slug])">
                  <img
                    :src="`/storage/${category.image}`"
                    alt="Placeholder"
                    class="object-cover h-48 w-full"
                  />
                </a>
              </div>
              <div class="col-span-3 row-span-1 bg-[#909399]">
                <header
                  class="flex items-start flex-column justify-between leading-tight p-2 md:p-4"
                >
                  <h1 class="text-lg">
                    <a
                      class="no-underline hover:underline text-white"
                      :href="route('user.category.show', [category.slug])"
                      target="_blank"
                    >
                      {{ category.title }}
                    </a>
                  </h1>
                </header>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppUserLayout'

export default {
  components: {
    AppLayout,
  },
  props: {
    categories: Object,
  },
}
</script>
