<template>
  <div class="container" v-if="product"> 
      <h2>{{product.type}}</h2>
      <p>{{product.model}}</p>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Height</th>
            <th>Width</th>
            <th>Depth</th>
            <th>Outlet height</th>
            <th>Bottom-cone slope</th>
            <th>Volume</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{product.itemNumber}}</td>
            <td>{{product.height}} mm</td>
            <td>{{product.width}} mm</td>
            <td>{{product.depth}} mm</td>
            <td>{{product.outletHeight}} mm</td>
            <td>{{product.bottomConeSlope}}°</td>
            <td>{{product.volume}}</td>
            <td>{{product.price}}</td>
        </tr>
        </tbody>
    </table>
</div>
  </div>
</template>

<script>

export default {
  name: "ProductData",
  data() {
    return {
      product: null
    }
  },
  created() {
    this.getDataOfProduct();
  },
  methods: {
    async getDataOfProduct() {
      const response = await this.$store.dispatch('getProducts');
      var id = this.$route.query.productId;
      var productIndex = response.data.findIndex(x => x.productId === parseInt(id));
      this.product = response.data[productIndex];
      console.log(this.product);
    },
  }
}
</script>

<style scoped>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2 {
    text-align: center;
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgb(0, 0, 0);
    padding: 30px 0;
}


/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #343a40;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #343a40;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 15px .625em .625em .625em;
        height: 50px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
</style>