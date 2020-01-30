<script>
  import VueGallery from 'vue-gallery';

  export default {
    props: ['images'],
    data: function () {
      return {
        index: null
      };
    },

    components: {
      'gallery': VueGallery
    },
  }
</script> 
<template>
  <div>
    <div class="image rounded" v-for="(image, imageIndex) in images" :key="imageIndex" @click="index = imageIndex" :style="{ backgroundImage: 'url(' + image + ')', height:'120px', backgroundSize: 'contain', position: 'relative' }"></div>

    <gallery :images="images" :index="index" @close="index = null"></gallery>
  </div>
</template>

<style scoped>
  .image {
    /* float: left; */
    position: relative;
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    border: 1px solid #ebebeb;
    margin: 5px;
  }
</style>