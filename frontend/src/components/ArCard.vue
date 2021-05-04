<template>
  <div class="card" style="width: 18rem;" v-show="show">
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true" style="font-size: 35px; float: left; margin-left: 10px"
            v-on:click="show = false">&times;</span>
    </button>
    <div class="card-body">
      <h5 class="card-title">QR</h5>
      <vue-qrcode :value="path" :options="{ width: 100 }" id="qrCode"></vue-qrcode>
    </div>
  </div>
</template>

<script>
import VueQrcode from '@chenfengyuan/vue-qrcode';

export default {
  name: "ArCard",
  props: ['tempPath', 'tempShow'],
  components: {
    VueQrcode
  },
  data: function () {
    return {
      path: this.tempPath,
      show: this.tempShow
    }
  },
}
</script>

<style scoped>
.card {
  position: absolute;
  left: 70px;
  top: 540px;
  width: 80px;
}
</style>