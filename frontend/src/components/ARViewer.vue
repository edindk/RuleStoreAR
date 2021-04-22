<template>
  <div class="row">
    <model-viewer id="modelViewer" v-bind:src="glbPath"
                  alt="A 3D model of an astronaut"
                  auto-rotate
                  camera-controls ar v-bind:ios-src="usdzPath" ar-scale="fixed"></model-viewer>
  </div>
</template>

<script type="module">
import ModelViewer from '@google/model-viewer'

export default {
  name: "ARViewer",
  components: {
    ModelViewer
  },
  data() {
    return {
      glbPath: 'http://127.0.0.1:8000/api/glb',
      usdzPath: ' http://127.0.0.1:8000/api/usdz',
    }
  }
}
</script>

<style scoped>
#modelViewer {
  width: 400px;
  height: 600px;
}
</style>