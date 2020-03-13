<template>
    <div>
        <div class="card mb-1 shadow rounded-0">
            <div class="foot row w-100 mx-auto">
                <div class="col-12  shadow">
                    <h3 class="m-0 p-1">{{title}}</h3>
                </div>                  
            </div>   
            <div class="row no-gutters">
                <div :class="big == false ? 'col-md-4 m-md-4': 'col-md-12'" v-if="src != ''">
                    <img v-if="src != ''" :src="'/images/' + src" class="card-img-top" alt=""> 
                </div>
                <div :class="src == '' || big == true?'col-md-12': 'col-md-7'">
                    <div class="card-body">
                        <p class="card-text content-text" v-html="limitString(body,400, post.id)"></p>
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="card-text">Written by: <br><Profilephoto :src="post.user.src" :cls="'d-inline'"></Profilephoto> {{post.user.name}}</p>
                            </div>
                            <div class="col-6"> 
                                <small class="text-muted">{{moment.utc(post.created_at).fromNow()}}</small>
                            </div>
                        </div>
                        <div v-if="loged == true" class="btn-container row">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-light text-decoration-none pr-0" @click="like(auth.id,post.id)">
                                    <img v-if="likeC.includes(auth.id.toString())" src="/ico/unlike.svg" alt="" width="25px">
                                    <img v-else src="/ico/like.svg" alt="" width="25px"> 
                                    <span 
                                    v-if="likes > 0"
                                    class="badge badge-light like-span"
                                    data-toggle="popover"
                                    data-placement="top" 
                                    data-trigger="hover"
                                    :data-content="txt"
                                    data-html="true">
                                    {{likes}} 
                                    </span>                              
                                </button>
                                <button 
                                class="btn btn-light text-decoration-none"
                                data-toggle="collapse" 
                                :href="'#comment'+ post.id.toString()" 
                                role="button" 
                                aria-expanded="false" 
                                aria-controls="collapseExample">
                                    <img src="/ico/comment.svg" alt="" width="25px">
                                    <span v-if="comts.length > 0" class="badge badge-light">{{comts.length}}</span>
                                </button>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button"
                                    class="btn btn-light dropdown-toggle" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/ico/share.svg" alt="share" width="25px">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" target="_blank" :href="'https://www.facebook.com/sharer/sharer.php?u=http%3A//127.0.0.1%3A8000/posts/postDetail/'+post.id">
                                        <img src="/ico/facebook.svg" alt="facebook" width="25px">
                                        Facebook
                                        </a>
                                        <a class="dropdown-item" target="_blank" :href="'https://twitter.com/intent/tweet?text=http%3A//127.0.0.1%3A8000/posts/postDetail/'+ post.id">
                                        <img src="/ico/twitter.svg" alt="twitter" width="25px">
                                        Twitte
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <div v-if="loged == false" class="btn-container row">

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-light text-decoration-none" type="button" data-toggle="modal" data-target="#notloged">
                                    <img src="/ico/like.svg" alt="" width="25px"> 
                                    <span 
                                    v-if="likes > 0"
                                    class="badge badge-light like-span"
                                    data-toggle="popover"
                                    data-placement="top" 
                                    :data-content="txt"
                                    data-html="true">
                                    {{likes}} 
                                    </span>
                                </button>
                                <button class="btn btn-light text-decoration-none" data-toggle="modal" data-target="#notloged">
                                    <img src="/ico/comment.svg" alt="" width="25px"> 
                                    <span v-if="comts.length > 0" class="badge badge-light">{{comts.length}}</span>
                                </button>
                                <button class="btn btn-light" 
                                data-toggle="modal" data-target="#notloged">
                                    <img src="/ico/share.svg" width="25px">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" :id="'comment'+ post.id.toString()">
                <div class="card card-body">
                    <div class="input-group mb-3">
                        <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Recipient's username" 
                        aria-label="Recipient's username" 
                        aria-describedby="button-addon2"
                        required
                        v-model="newC">
                        <div class="input-group-append">
                        <button 
                        class="btn inner-comment-btn" 
                        type="button" 
                        id="button-addon2"
                        @click="addComment(auth.id, post.id, newC)">
                        Comment
                        </button>
                        </div>
                    </div>
                    <Comment 
                    v-for="comt in comts" 
                    :key="'cc'+comt.id" :comt="comt"
                    :auth="auth"
                    v-on:delItem="getDelItem"
                    ></Comment>
                </div>
            </div>
       </div><a id="dots" :href="same(`/posts/postDetail/${post.id}`)"></a>
    </div>
</template>
<script>



import axios from 'axios';
import Comment from './Comment';
import Profilephoto from './Profilephoto';

export default {
    name:'Mainpost',
    components:{Comment, Profilephoto},
    props:{
        big:Boolean,
        src: String,
        title: String,
        body: String,
        loged: Boolean,
        auth:[String, Number, Object],
        post:[String, Number, Object],
        likeC:Array,
        comments:[String,Object,Array],
        
        
    },
    data: function(){
        return {
            likes: this.likeC.length -1,
            comts:this.comments.sort((a, b)=>{return b['id'] - a['id']}),
            newC:'',
            delComment:'',
            txt:'',
            moment:require('moment')
        }
    },
    mounted: function(){      
          this.usersLikes(this.likeC);       
    },
    methods:{
        same: function(val){
            return val
        },
        like: function(authId, postId){
        axios.post(`/posts/like/${authId}/${postId}`)
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
        addComment(userId, postId, commentBody){
            if(commentBody != ''){
                axios.post(`/comments/add/${userId}/${postId}`,{
               body:commentBody
                }).then((response) => {
                    this.newC = '';
                    this.comts.unshift(response.data[0])
                })
            }          
        },
        getDelItem: function(val){          
           this.comts = this.comts.filter(function( obj ) {
                return obj.id != val;
            });         
        },
        usersLikes(likes){  
            if(likes.length > 1 && this.auth != null){
                axios.get(`/post/getusername/${likes}`)
                .then((response)=>{      
                    for(let i = 0; i < response.data.length; i++){
                        this.txt += ` <a href="">${response.data[i].name}</a> -`
                    }
                })           
            }
        },
        limitString(str, limit, postId){
           let dot = `<a href="/posts/postDetail/${postId}"> read more</a>` 
           if(str.length > limit && this.big == false){
              let string = str.substring(0, limit) + dot;
              return string
               
           }
           return str;
        }, 
                
    },
}
</script>
<style lang="scss" scoped>
.card{
        .btn-container{
            div:nth-child(1){
           // background-color: #0E7F43;
           .like-span{
               cursor: pointer;
           }
            }
            div:nth-child(2){
           // background-color: #A4CB38;
            }
        }
        .card-body{
            .content-text{
                
            }
        }
        .foot{
            div{
                 background-color: #3E7828;
                 h3{
                     color:#fff;                    
                 }
            }
        }
         .inner-comment-btn{
             background-color: #3E7828;
             color:#fff; 
         }

}

</style>


