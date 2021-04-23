<template>
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-4 offset-1">
            <h1 style="text-align: left">Lorem ipsum dolor sit amet</h1>
            <hr class="my-4">
            <p style="text-align: left" id="subhead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              sagittis posuere ultricies.</p>
            <button type="button" class="btn btn-success btn-lg mt-3" style="float: left">Kontakt os nu!</button>
          </div>
          <div class="col-md-3 offset-2">
            <model-viewer id="modelViewer" v-bind:src="glbPath"
                          alt="A 3D model of an astronaut"
                          auto-rotate
                          interaction-prompt="none"
                          rotation-per-second="300%"
                          camera-controls v-bind:ios-src="usdzPath" ar-scale="fixed">

            </model-viewer>
          </div>
        </div>
      </div>
    </div>
    <product-carousel></product-carousel>
  </div>
</template>

<script>
import ModelViewer from '@google/model-viewer'
import ProductCarousel from "@/components/ProductCarousel";

export default {
  name: 'Home',
  components: {
    ModelViewer,
    ProductCarousel
  },
  data() {
    return {
      products: null,
      glbPath: 'http://127.0.0.1:8000/api/glb',
      usdzPath: 'http://127.0.0.1:8000/api/usdz',
    }
  },
}
</script>
<style>
.jumbotron {
  background-color: white;
}

#modelViewer {
  width: 400px;
  height: 500px;
}


#subhead {
  font-size: 24px;
}
</style>