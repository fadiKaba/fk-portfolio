<template>
        <div class="card mb-2">
            <div class="foot row w-100 mx-auto">
                <div class="col-12 rounded-top py-2">
                    <h3 class="">updated at 2:66</h3>
                </div>                  
            </div>           
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img v-if="src != ''" :src="'./images/' + src" class="card-img-top" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{title}}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <div class="btn-container row">
                            <div class="col-4">
                                <Normalbtn :name="same('Like')" :icon="same('../icons/like.svg')"></Normalbtn>
                            </div>
                            <div class="col-8">
                                <Normalbtn :name="same('Like')" :icon="same('../icons/like.svg')"></Normalbtn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</template>
<script>

import Normalbtn from './Normalbtn';

export default {
    name:'Mainpost',
    components:{Normalbtn},
    props:{
        src: String,
        title: String,
        body: String,
    },
    methods:{
        same: function(val){
            return val
        },
    }
}
</script>
<style lang="scss" scoped>
.card{
        .btn-container{
            div:nth-child(1){
            background-color: #0E7F43;
            }
            div:nth-child(2){
            background-color: rgba(164, 203, 56, 0.596);
            }
        }
        .foot{
            div{
                 background-color: #0E7F43;
            }
        }

}

</style>