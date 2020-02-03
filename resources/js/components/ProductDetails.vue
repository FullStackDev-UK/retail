<script>
    import {HTTP} from '../http-common';
    import Axios from 'axios';
    import ImageGallery from './ImageGallery';

    export default {
        props: ['product','product_images'],
        data() {
            return {
                info: null,
                index: null,
                response: null,
                errors: []
            }
        },
        mounted() {
            // axios
            //     .get('')
            //     .then(response => (this.whatever = response))
        },
        created() {
            // console.log(this.$props['product'])
            // console.log(this.$props['product_images'])
        },
        methods: {
            productImages(){
                var imageArray = []
                var pi = this.$props['product_images']
                var pi_array = Object.values(pi).map(function(v) {
                    imageArray.push(v.image_address)
                    return v
                })
                console.log("imageArray: ", imageArray);
                console.log("pi_array: ", pi_array);

                return imageArray
            },
            addToOrder(){
                // Post product.id to OrderController@add-to-order
                HTTP.post('/retail/add-to-order/'+this.product.id)
                .then(response => {
                    this.response = response
                    console.log(response)
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }
        },
        computed: {
            productcell(){
                return this.$props['product']
            }
        },
        components: {
            'image-gallery': ImageGallery
        }
    }
</script>
<template>
    <div class="card justify-content-center">

        <div class="card-header"><h4>Product</h4></div>

        <div class="card-body">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>{{productcell.name}}</h4>
                    <h4>{{info}}</h4>
                </div>

                <div class="panel-body">
                    <div class="shadow-md light-grey-bg mb-3">
                        <h5 class="vliheading">Please <a :href='"/retail/contact"' class="inline-link">let us know</a> if you require any assistance...</h5>

                        <div class="row">
                            <div class="col-md-3">
                                <image-gallery :images="productImages()" :index="index" @close="index = null"></image-gallery>
                            </div>

                            <div class="col-md-9">
                                <p>
                                    <span><b class="text-green">Type:</b> {{productcell.type}}</span><br />
                                    <span><b class="text-green">Size:</b> {{productcell.size}}</span><br />
                                    <span><b class="text-green">Description:</b> {{productcell.description}}</span><br />
                                    <span><b class="text-green">Price:</b> {{productcell.price}}</span><br />
                                </p>

                                <p class="p-3 m-3 centered">
                                    <a :href='"/retail/products"' class="px-2 py-2 CTA">Back</a>
                                    <a v-on:click="addToOrder()" class="px-2 py-2 CTA">Add to cart</a>
                                </p>

                                <div v-if="this.response!=null">
                                    <p class="announce p-3 m-3 centered"><span>{{this.response.data}}</span></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<style lang="scss">
</style>
