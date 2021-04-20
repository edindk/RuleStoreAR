<template>
  <div class="row">
    <model-viewer id="modelViewer" src="/assets/scaleTest.glb"
                  alt="A 3D model of an astronaut"
                  auto-rotate
                  camera-controls ar ios-src="/assets/scaleTest.usdz" ar-scale="fixed"></model-viewer>
  </div>
</template>

<script type="module">
import ModelViewer from '@google/model-viewer'

export default {
  name: "ARViewer",
  components: {
    ModelViewer
  },
}
</script>

<style scoped>
#modelViewer {
  width: 400px;
  height: 600px;
}
</style>