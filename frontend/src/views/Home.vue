<template>
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-4 offset-md-2" id="jumbplacement">
            <h1 style="text-align: left">Skab en totaloplevelse med AR</h1>
            <hr class="my-4">
            <p style="text-align: left" id="subhead">Giv kunderne en ny måde at opleve dine produkter på,
              når du føjer Augmented Reality (AR) til din webshop.
            </p>
            <button type="button" class="btn btn-success btn-lg mt-3" style="float: left">Oplev det herunder</button>
          </div>
          <div class="col-md-3" id="mvplacement">
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
    ProductCarousel,
  },
  data() {
    return {
      products: null,
      glbPath: 'http://127.0.0.1:8000/api/glb/1',
      usdzPath: 'http://127.0.0.1:8000/api/usdz/1',
    }
  },
}
</script>
<style>
#jumbplacement {
  padding: 50px 0px 0px 30px;
}

#mvplacement {
  margin-left: 75px;
}

@media (max-width: 768px) {
  #mvplacement {
    margin: 0px;
  }
  #jumbplacement {
    padding: 0px;
  }
}

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