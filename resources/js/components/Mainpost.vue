<template>
        <div class="card mb-0 rounded-0">
            <div class="foot row w-100 mx-auto">
                <div class="col-12 py-2  shadow">
                    <h3 class="text-light">{{title}}</h3>
                </div>                  
            </div>           
            <div class="row no-gutters">
                <div class="col-md-4 m-md-4">
                    <img v-if="src != ''" :src="'./images/' + src" class="card-img-top" alt="">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <p class="card-text">{{body}}</p>
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
            background-color: #A4CB38;;
            }
        }
        .foot{
            div{
                 background-color: #0E7F43;
            }
        }

}

</style>