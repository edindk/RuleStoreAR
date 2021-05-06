<template>
  <div class="container">
    <video id="vidTag" muted autoplay loop>
      <source src="@/assets/img/video.mp4" type="video/mp4" />
      Your browser does not support the video.
    </video>
  </div>
</template>

<script>
export default {
  name: "DemoVideo",
  data() {
    return {};
  },
  created() {},
  methods: {},
};
</script>

<style scoped>
#vidTag {
  position: absolute;
  height: 100%;
  left: auto;
  top: 0;
  border-radius: 18px;
}
</style>