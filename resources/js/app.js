import * as Vue from "vue";
global.Vue = global.Vue = require('vue');
Vue.config.productionTip = false

import Vuex from 'vuex';
Vue.use(Vuex);

// import axios from "axios";
global.axios = global.axios = require('axios');
window.axios = require('axios');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import {store} from './store';

require('./bootstrap');

require('./components/ContactForm');

Vue.component('product-list', require('./components/ProductList').default);
Vue.component('product-details', require('./components/ProductDetails').default);

Vue.component('image-gallery', require('./components/ImageGallery').default);
Vue.component('contact-form', require('./components/ContactForm').default);

var obj = {
    foo: 'bar'
}

const Foo = { template: '<div>foo</div>' }
const Contact = { template: '<contact-form></contact-form>' }

const routes = [
  { path: '/foo', component: Foo },
  { path: '/contact', component: Contact }
]

const router = new VueRouter({
  mode: 'history',
  hash: false,
  routes: routes,
  path: '*', redirect: '/'
})

// Main Vue container
new Vue({
    el: '#app',
    store,
    router,
    data () {
        return {
            obj: obj,
            info: null
        }
    },
    created() {
    },
    mounted () {
      function writeWidth(e){
        store.commit('setWindowWidth',window.innerWidth);
        console.log("Debounced event: window.innerWidth: " + window.innerWidth);
      }
      $(window).on('resize', _.debounce(writeWidth, 1000));
    },
    mutations: {
        setWindowWidth(w) {
            windowWidth = w;
            console.log(w);
        }
    },
    computed: {
        windowWidth() {
            return this.$store.state.windowWidth;
        }
    }
})
