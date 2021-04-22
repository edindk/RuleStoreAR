<template>
  <div id="master">
    <navbar></navbar>
  <router-view/>
  </div>
</template>

<script>
import Navbar from './containers/Navbar'

export default {
  name: "Master",
  components: {
    Navbar
  },
}
</script>

<style scoped>

</style>