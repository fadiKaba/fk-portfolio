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
                                <button class="btn btn-link text-decoration-none" @click="like(auth.id,post.id)">
                                    <img v-if="likeC.includes(auth.id.toString())" :src="same('../icons/unlike.svg')" alt="" width="25px">
                                    <img v-else :src="same('../icons/like.svg')" alt="" width="25px"> 
                                    <span class="badge badge-light">{{likes}} </span>                              
                                </button>
                            </div>
                            <div class="col-8">
                                <button 
                                class="btn btn-link text-decoration-none"
                                data-toggle="collapse" 
                                :href="'#comment'+ post.id.toString()" 
                                role="button" 
                                aria-expanded="false" 
                                aria-controls="collapseExample">
                                    <img :src="same('../icons/comment.svg')" alt="" width="25px">
                                    <span class="badge badge-light">{{comments.length}}</span>
                                </button>
                            </div>
                        </div>
                        <div v-if="loged == false" class="btn-container row">
                            <div class="col-4">
                                <button class="btn btn-link text-decoration-none" type="button" data-toggle="modal" data-target="#notloged">
                                    <img :src="same('../icons/like.svg')" alt="" width="25px"> 
                                    <span class="badge badge-light">{{likes}}</span>
                                </button>
                            </div>
                            <div class="col-8">
                                <button class="btn btn-link text-decoration-none" data-toggle="modal" data-target="#notloged">
                                    <img :src="same('../icons/comment.svg')" alt="" width="25px"> 
                                    <span class="badge badge-light">{{comments.length}}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" :id="'comment'+ post.id.toString()">
                <div class="card card-body">
                    <Comment :auth="auth" :post="post" :comments="same(comments)"></Comment>
                </div>
            </div>
       </div>
    </div>
</template>
<script>

import axios from 'axios';
import Comment from './Comment';

export default {
    name:'Mainpost',
    components:{Comment,},
    props:{
        src: String,
        title: String,
        body: String,
        loged: Boolean,
        auth:[String, Number, Object],
        post:[String, Number, Object],
        likeC:Array,
        comments:[String,Object,Array]
    },
    data: function(){
        return {
            likes: this.likeC.length -1
        }
    },
    mounted: function(){      
         // console.log(this.user);           
    },
    methods:{
        same: function(val){
            return val
        },
        like: function(authId, postId){
        axios.post(`posts/like/${authId}/${postId}`)
        .then( (respone) => {
            if(respone.data == 'like'){
                this.likes +=1
                this.likeC.push(authId.toString())
            }else{
                this.likes -=1
                let ind = this.likeC.indexOf(authId.toString())
                if(ind > -1){
                    this.likeC.splice(ind, 1);
                }
            }
        }).catch(err => console.log(err))
        },
    }
}
</script>
<style lang="scss" scoped>
.card{
        .btn-container{
            div:nth-child(1){
           // background-color: #0E7F43;
            }
            div:nth-child(2){
           // background-color: #A4CB38;
            }
        }
        .foot{
            div{
                 background-color: #0E7F43;
            }
        }

}

</style>