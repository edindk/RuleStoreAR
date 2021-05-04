<template>
  <div class="container">
    <div class="row">
      <div class="card col-md-3  offset-1 mb-4" style="width: 18rem;" v-for="product in products"
           :key="product.productId">
        <div class="box">
          <img class="card-img-top mt-1" :src="require(`@/assets/img/product_img${product.productId}.png`)"
               alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title text-left">{{ product.type }}</h5>
          <p class="card-text mb-0 text-left">Varenummer: {{ product.itemNumber }}</p>
          <p class="card-text mb-0 text-left">Model: {{ product.model }}</p>
          <p class="card-text mb-0 text-left">Højde (mm): {{ product.height }}</p>
          <p class="card-text mb-0 text-left">Dybde (mm): {{ product.depth }}</p>
          <p class="card-text mb-0 text-left">Bredde (mm): {{ product.width }}</p>
          <p class="card-text mb-0 text-left">Udløbshøjde (mm): {{ product.outletHeight }}</p>
          <p class="card-text mb-0 text-left">Volumen: {{ product.volume }}</p>
          <p class="card-text mb-0 text-left">Indhold (T): {{ product.contents }}</p>
          <p class="card-text mb-0 text-left">Bundkegle hældning: {{ product.bottomConeSlope }}</p>
          <p class="card-text mb-0 text-left">Indblæsning: {{ product.supplyAir }}</p>
          <h4 class="card-text mt-3 text-left">Pris: {{ product.price }}</h4>
          <a class="btn btn-success mt-3">Føj til tilbud</a>
          <a class="btn btn-primary mt-3 ml-2" v-on:click="showArCard(product.productId)" id="qrCode">Se i AR</a>
          <a class="btn btn-primary mt-3 ml-2" :href="product.path" id="arBtn">Se i AR</a>
          <div class="card" style="width: 18rem;" v-if="product.showQr" id="arCard">
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true" style="font-size: 35px; float: left; margin-left: 10px"
                    v-on:click="showArCard(product.productId)">&times;</span>
            </button>
            <div class="card-body">
              <h5>QR</h5>
              <vue-qrcode :value="product.path" :options="{ width: 180}"></vue-qrcode>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueQrcode from '@chenfengyuan/vue-qrcode';
import ArCard from "@/components/ArCard";

export default {
  name: "ProductCarousel",
  components: {
    VueQrcode,
    ArCard
  },
  data() {
    return {
      products: null,
      show: false
    }
  },
  created() {
    this.getProducts()
  },
  methods: {
    async getProducts() {
      const response = await this.$store.dispatch('getProducts')
      this.products = response.data

      for (const productKey in this.products) {
        this.products[productKey].path = 'http://localhost:8080/arviewer?productId=' + this.products[productKey].productId
        this.products[productKey].showQr = false
      }
      console.log(this.products)
    },
    showArCard(productId) {
      for (const productKey in this.products) {
        if (this.products[productKey].productId == productId) {
          if (this.products[productKey].showQr == false) {
            this.products[productKey].showQr = true;
          } else {
            this.products[productKey].showQr = false;
          }
        }
      }
      this.$forceUpdate()
    }
  }
}
</script>

<style scoped>
.box {
  width: 100%;
  height: 200px;
}

img {
  width: 45%;
  height: 100%;
}

@media screen and (min-width: 1025px) {
  #qrCode {
    display: inline-block;
  }

  #arBtn {
    display: none;
  }
}

@media screen and (max-width: 1024px) {
  #qrCode {
    display: none;
  }

  #arBtn {
    display: inline-block;
  }
}

#arCard {
  position: absolute;
  left: 130px;
  top: 610px;
  width: 240px !important;
  height: 270px !important;
}

</style>