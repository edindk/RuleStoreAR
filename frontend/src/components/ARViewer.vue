<template>
  <div class="arviewer">
    <model-viewer id="modelViewer" v-bind:src="glbPath"
                  alt="A 3D model of an astronaut"
                  auto-rotate
                  camera-controls ar v-bind:ios-src="usdzPath" ar-scale="fixed">

    </model-viewer>
  </div>
</template>

<script>
import ModelViewer from '@google/model-viewer'

export default {
  name: "ARViewer",
  components: {
    ModelViewer
  },
  data() {
    return {
      glbPath: 'http://127.0.0.1:8000/api/glb/',
      usdzPath: 'http://127.0.0.1:8000/api/usdz/',
    }
  },
  created() {
    this.glbPath = this.glbPath + this.$route.query.productId
    this.usdzPath = this.usdzPath + this.$route.query.productId
  }
}
</script>

<style scoped>
#modelViewer {
  width: 400px;
  height: 600px;
}
</style>