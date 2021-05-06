<template>
  <div>
    <div id="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6" id="head">
            <h1 style="text-align: left">Skab en totaloplevelse med AR</h1>
            <hr class="my-4" />
            <p style="text-align: left" id="subhead">
              Giv kunderne en ny måde at opleve dine produkter på, når du føjer
              Augmented Reality (AR) til din webshop.
            </p>
            <button
              type="button"
              class="btn btn-success btn-lg mt-3"
              style="float: left"
            >
              Oplev det herunder
            </button>
          </div>
          <div class="col-md-5" id="mv">
            <demo-video />
          </div>
        </div>
      </div>
    </div>
    <product-carousel></product-carousel>
  </div>
</template>

<script>
import ModelViewer from "@google/model-viewer";
import ProductCarousel from "@/components/ProductCarousel";
import DemoVideo from "../components/DemoVideo.vue";

export default {
  name: "Home",
  components: {
    ModelViewer,
    ProductCarousel,
    DemoVideo,
  },
  data() {
    return {
      products: null,
      glbPath: "http://127.0.0.1:8000/api/glb/1",
      usdzPath: "http://127.0.0.1:8000/api/usdz/1",
    };
  },
};
</script>
<style>
#mv {
  margin: 50px 10px 30px 35px;
  margin-left: auto;
  margin-right: auto;
  display: block;
}

#head {
  margin: 64px 0px 20px 50px;
}

@media screen and (max-width: 1200px) {

  #head {
    margin: 50px 0px 0px 0px;
  }
}

#modelViewer {
  width: 400px;
  height: 500px;
}
#subhead {
  font-size: 24px;
}

#wrapper {
  background-color: rgba(223, 226, 230, 0.3);
  width: 100% !important;
  margin-bottom: 50px;
}
</style>