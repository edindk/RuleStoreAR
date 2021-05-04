<template>
  <div id="app">
    <master></master>
  </div>
</template>

<script>
import Master from './components/Master'

export default {
  name: "App",
  components: {
    Master
  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
