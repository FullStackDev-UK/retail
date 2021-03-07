<template>
  <div>

    <!-- <div class="image rounded" v-for="(image, imageIndex) in images" :key="imageIndex" @click="index = imageIndex" :style="{ backgroundImage: 'url(' + image + ')', height:'120px', backgroundSize: 'contain', position: 'relative', backgroundRepeat: 'no-repeat' }"></div> -->

    <ul class="image rounded centered">
      <li v-for="(image, imageIndex) in images" :key="imageIndex" @click="index = imageIndex"><img :src="image" /></li>
    </ul>

  </div>
</template>
<script>
  import {store} from '../store';

  export default {
    components: {
      store
    },
    props: {
      images: Array
    },
    data(){
      return {
        index: null
      };
    }
  }
</script> 
<style scoped>
  .image {
    padding: 5px;
    position: relative;
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    border: 1px solid #ebebeb;
    margin: 5px;
    
    background: rgb(255,255,255);
    background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%, rgba(65,184,131,1) 83%) !important;
    background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%,rgba(65,184,131,1) 83%) !important;
    background: radial-gradient(ellipse at center,  rgba(255,255,255,1) 11%,rgba(65,184,131,1) 83%) !important;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#41b883',GradientType=1 );
  }
  .image img {
    max-height: 120px !important;
  }
</style>