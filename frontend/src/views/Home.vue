<template>
  <div class="row">
    <div class="col-md-3"><p>test</p></div>
    <div class="col-md-6">
      <div class="col-md-2" v-for="product in products "><p>{{ product.type }} - {{ product.itemNumber }} -
        {{ product.model }} - {{ product.height }}
        - {{ product.depth }} - {{ product.width }} - {{ product.outletHeight }} - {{ product.volume }} -
        {{ product.contents }} - {{ product.bottomConeSlope }}
        - {{ product.supplyAir }} - {{ product.price }}
      </p></div>
    </div>
    <div class="col-md-3"><h1>test</h1></div>
  </div>
</template>

<script>
// @ is an alias to /src
//import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    //HelloWorld
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
    },

  }
}
</script>
