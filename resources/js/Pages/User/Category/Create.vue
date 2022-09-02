<template>
    <div id="app">
        <input type="file">
    </div>
</template>

  <script>
import FilePondDemo from "@/Components/Shared/FilePond";

export default {
    name: 'app',
    components: {
        FilePondDemo
    }
}
</script>

  <style>
  #app {
      font-family: 'Avenir', Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-align: center;
      color: #2c3e50;
  }
  </style>
