<script>
    import {HTTP} from '../http-common';
    import ImageGallery from './ImageGallery.vue';

    export default {
        mounted() {
        },
        data() {
            return {
                heading: 'Featured Products',
                description: 'Images and a description of featured products...',
                products: '',
                productsPerRow: 3,
                images: [
                    'public/images/Bottle_edit.jpg'
                ],
                index: null,
                errors: []
            }
        },
        created() {
            HTTP.get('productlist')
                .then(response => {
                    this.products = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
        methods: {
        },
        computed: {
            rowCount() {
                return Math.ceil(this.products.length / this.productsPerRow)
            },
            mobile() {
                return this.$store.state.windowWidth <= 480
            }
        },
        components: {
            'image-gallery': ImageGallery
        }
    }
</script>
<template>
    <div class="panel panel-default justify-content-center">

        <div class="panel-heading jumbotron m-0 jumbotronGrad">
            <h1>{{heading}}</h1>
            <p>{{description}}</p>
        </div>

        <div class="panel-body">

            <div class="card">

                <div class="card-header"><h4>Product list</h4></div>

                <div class="card-body align-items-stretch">

                    <b-container fluid>
                        <b-row>
                            <div v-for="product of products" v-bind:key="product.id" class="col-md-4 p-3">
                                
                                <div class="shadow-md rounded">

                                    <h5 class="vliheading roundedTop vgrad">{{product.name}}</h5>

                                    <image-gallery :images="images" :index="index" @close="index = null"></image-gallery>

                                    <div class="light-grey-bg roundedBottom">
                                        <b class="text-green">Type:</b> {{product.type}}<br />
                                        <b class="text-green">Size:</b> {{product.size}}<br />
                                        <b class="text-green">Description:</b> {{product.description}}<br />
                                        <b class="text-green">Price:</b> £{{product.price}}<br />

                                        <p class="p-3 m-3 centered">
                                            <a :href='"product/"+product.id' class="px-2 py-2 CTA">View details</a>
                                        </p>
                                    </div>

                                </div>

                            </div>
                        </b-row>
                    </b-container>

                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
</style>
