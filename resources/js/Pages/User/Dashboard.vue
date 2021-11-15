<template>
  <app-layout title="Stok Görselleri">
    <div class="row">
      <div class="col-sm-12 col-lg-10 col-md-10">
        <h3>
          Stok Görselleri
        </h3>
        <hr />
        <el-scrollbar>
          <div class="row">
            <div
              v-for="item in 4"
              v-bind:key="item"
              class="col-sm-12 col-md-4 my-4"
            >
              <div
                class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded hover:shadow-xl transition-shadow duration-300 ease-in-out border"
              >
                <div class="col-span-3 row-span-4">
                  <a target="_blank" :href="'#'">
                    <img
                      :src="`https://picsum.photos/200`"
                      alt="Placeholder"
                      class="object-cover h-48 w-full"
                    />
                  </a>
                </div>
                <div class="col-span-3 row-span-1 bg-red-500">
                  <header
                    class="flex items-center justify-between leading-tight p-2 md:p-4"
                  >
                    <h1 class="text-lg">
                      <a
                        class="no-underline hover:underline text-white"
                        ::href="'#'"
                        target="_blank"
                      >
                        Tekli Görsel
                      </a>
                    </h1>
                  </header>
                </div>
              </div>
            </div>
          </div>
        </el-scrollbar>
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
}
</script>
