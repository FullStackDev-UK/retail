import * as Vue from "vue";
global.Vue = global.Vue = require('vue');
Vue.config.productionTip = false

import Vuex from 'vuex';
Vue.use(Vuex);

import axios from "axios";
global.axios = global.axios = require('axios');
window.axios = require('axios');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

require('./bootstrap');

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

require("@babel/register");
require('./components/ContactForm');

Vue.component('product-list', require('./components/ProductList').default);
Vue.component('product-details', require('./components/ProductDetails').default);

Vue.component('image-gallery', require('./components/ImageGallery').default);
Vue.component('contact-form', require('./components/ContactForm').default);

var obj = {
    foo: 'bar'
}

const store = new Vuex.Store({
  state: {
    windowWidth: window.innerWidth,
  },  mutations: {
    setWindowWidth(state) {
      state.windowWidth = window.innerWidth;
    }
  },});

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
        window.addEventListener('load', (event) => {
            store.commit('setWindowWidth')
            console.log("window.innerWidth: " + store.state.windowWidth)
        }),
        window.addEventListener('resize', (event) => {
            store.commit('setWindowWidth')
            console.log("window.innerWidth: " + store.state.windowWidth)
        })
    },
    mounted () {
        //axios
            //.get('http://')
            //.then(response => (this.info = response))
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

let first = "John";
            let last = "Doe";
            var name = `Your name is ${first} ${last}.`

            var roadPoem = `Then took the other, as just as fair,
                            And having perhaps the better claim
                            Because it was grassy and wanted wear,
                            Though as for that the passing there
                            Had worn them really about the same,`

            console.log("name: "+name);
            console.log("roadPoem: "+roadPoem);

            var newOne = () => {
                console.log("This is returned from the main.js file 2");
            }
            newOne()
            