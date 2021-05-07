<template>
  <div class="arviewer" v-if="product">
    <div class="col-md-4">
      <model-viewer id="modelViewer" v-bind:src="glbPath"
                    alt="A 3D model of an astronaut"
                    auto-rotate
                    camera-controls
                    shadow-intensity="0.8"
                    shadow-softness="1.5"
                    exposure="1.3"
                    ar
                    v-bind:ios-src="usdzPath"
                    ar-scale="fixed">
        <button v-if="product.productId==1"
                slot="hotspot-dot+X-Y+Z"
                class="dot"
                data-position="1.5 -2 1.5"
                data-normal="1 0 0"
        ></button>
        <button v-if="product.productId==1"
                slot="hotspot-dim+X-Y"
                class="dim"
                data-position="1.8 -2 0"
                data-normal="1 0 0"
        >Bredde: {{ this.product.width }}mm
        </button>
        <button v-if="product.productId==1"
                slot="hotspot-dot+X-Y-Z"
                class="dot"
                data-position="1.5 -2 -1.5"
                data-normal="1 0 0"
        ></button>
        <button v-if="product.productId==1"
                slot="hotspot-dim"
                class="dim"
                data-position="1.5 1 -1.5"
                data-normal="0 0 0"
        >Højde: {{ this.product.height }}mm
        </button>
        <button v-if="product.productId==1"
                slot="hotspot-dot"
                class="dot"
                data-position="1.5 3.2 -1.5"
                data-normal="1 0 0"
        />
        <button v-if="product.productId==1"
                slot="hotspot-dim+X-Y+Z"
                class="dim"
                data-position="-0.1 -2 -1.5"
                data-normal="1 0 0"
        >Dybde: {{ this.product.depth }}mm
        </button>
        <button v-if="product.productId==1"
                slot="hotspot-dot+X+Y-Z"
                class="dot"
                data-position="-1.5 -2 -1.5"
                data-normal="1 1 0"
        ></button>
        <div id="controls" class="dim" v-if="this.$route.query.productId == 1">
          <label for="src">Højde:</label>
          <select class="ml-2" id="src" @change="updateModel()" v-model="id">
            <option value="1">5110</option>
            <option value="2">4800</option>
            <option value="3">4900</option>
            <option value="4">5000</option>
          </select><br>
        </div>
      </model-viewer>
    </div>
    <div class="col-md-8">
      <product-data></product-data>
    </div>
  </div>
</template>

<script>
import ModelViewer from '@google/model-viewer'
import ProductData from './ProductData.vue'


export default {
  name: "ARViewer",
  components: {
    ModelViewer,
    ProductData
  },
  data() {
    return {
      glbPath: 'https://rulestorear.dk/api/public/api/glb/',
      usdzPath: 'https://rulestorear.dk/api/public/api/usdz/',
      product: null,
      id: ''
    }
  },
  created() {
    this.getDataOfProduct();
    this.glbPath = this.glbPath + this.$route.query.productId
    this.usdzPath = this.usdzPath + this.$route.query.productId
  },
  methods: {
    async getDataOfProduct() {
      const response = await this.$store.dispatch('getProducts');
      var id = this.$route.query.productId;
      var productIndex = response.data.findIndex(x => x.productId === parseInt(id));
      this.product = response.data[productIndex];
      console.log(this.product);
    },
    updateModel() {
      this.glbPath = 'https://rulestorear.dk/api/public/api/glb/' + this.id
      this.usdzPath = 'https://rulestorear.dk/api/public/api/usdz/' + this.id
    }
  }
}
</script>

<style scoped>
#modelViewer {
  width: 400px;
  height: 600px;
}

Updated upstream
#dataDiv {
  border-style: solid;
  border-color: red;
}

#mv-column {
  border-style: solid;
  border-color: green;
}

.dot {
  display: block;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
  background: rgb(255, 255, 255);
  --min-hotspot-opacity: 0;
}

.dim {
  background: rgba(0, 0, 0, 0.075);
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.554);
  color: rgba(0, 0, 0, 0.8);
  display: block;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  font-size: 12px;
  font-weight: 600;
  max-width: 128px;
  overflow-wrap: break-word;
  padding: 0.5em 1em;
  position: absolute;
  width: max-content;
  height: max-content;
  transform: translate3d(-50%, -50%, 0);
  --min-hotspot-opacity: 0;
}

#controls {
  position: absolute;
  bottom: 16px;
  left: 16px;
  max-width: unset;
  transform: unset;
}

.dim {
  background: #fff;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
  color: rgba(0, 0, 0, 0.8);
  display: block;
  font-family: Futura, Helvetica Neue, sans-serif;
  font-size: 18px;
  font-weight: 700;
  max-width: 128px;
  overflow-wrap: break-word;
  padding: 0.5em 1em;
  position: absolute;
  width: max-content;
  height: max-content;
  transform: translate3d(-50%, -50%, 0);
  --min-hotspot-opacity: 0;
}
</style>