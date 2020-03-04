<template>
    <div>
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
                        <div v-if="loged == true" class="btn-container row">
                            <div class="col-4">
                                <button class="btn text-light" @click="like(userId,postId)">
                                    <img :src="same('../icons/like.svg')" alt="" width="25px"> Like
                                </button>
                            </div>
                            <div class="col-8">
                                <button class="btn text-light">
                                    <img :src="same('../icons/comment.svg')" alt="" width="25px"> Comments
                                </button>
                            </div>
                        </div>
                        <div v-if="loged == false" class="btn-container row">
                            <div class="col-4">
                                <button class="btn text-light" type="button" data-toggle="modal" data-target="#notloged">
                                    <img :src="same('../icons/like.svg')" alt="" width="25px"> Like
                                </button>
                            </div>
                            <div class="col-8">
                                <button class="btn text-light" data-toggle="modal" data-target="#notloged">
                                    <img :src="same('../icons/comment.svg')" alt="" width="25px"> Comments
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    name:'Mainpost',
    components:{},
    props:{
        src: String,
        title: String,
        body: String,
        loged: Boolean,
        userId:[String, Number],
        postId:[String, Number],
    },
    methods:{
        same: function(val){
            return val
        },
        like: function(userId, postId){
            console.log(this.loged);
        axios.post(`posts/like/${this.userId}/${this.postId}`)
        .then( (respone) => {
            console.log(respone)
        }).catch(err => console.log(err))
        }
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