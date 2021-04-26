<template>
  <div class="container">
    <div class="row">


      <div class="card col-md-3  offset-1 mb-4" style="width: 18rem;" v-for="product in products" :key="product.productId">
        <img class="card-img-top mt-1" src="../assets/img/product_img.png" width="5px" height="400px"
             alt="Card image cap">
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
          <a href="#" class="btn btn-success mt-3">Føj til tilbud</a>
          <vue-qrcode :value="product.path" :options="{ width: 100 }" style="float: right" id="qrCode"></vue-qrcode>
          <a :href="product.path" class="btn btn-primary mt-3 ml-2" id="arBtn" >Se i AR</a>
        </div>
      </div>


    </div>
  </div>
</template>

<script>
import VueQrcode from '@chenfengyuan/vue-qrcode';

export default {
  name: "ProductCarousel",
  components: {
    VueQrcode
  },
  data() {
    return {
      products: null
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
      }
      console.log(this.products)
    },
  }
}
</script>

<style scoped>
@media screen and (min-width: 0px) and (max-width: 400px) {
  #qrCode{ display: block; }  /* show it on larger screens */
}
@media screen and (min-width: 0px) and (max-width: 1024px) {
  #qrCode{ display: none; }   /* hide it on smaller screens */
}
@media screen and (min-width: 0px) {
  #arBtn{ display: block; }  /* show it on smaller screens */
}
@media screen and (min-width: 1025px){
  #arBtn{ display: none; }   /* hide it on larger screens */
}
</style>