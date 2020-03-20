<template>
    <div class="main-container">
        <div>
            <div class="comment-container">
                <div class="p-1 p-md-2 m-0">
                    <a class="font-weight-bold d-block" :href="'/profile/' + comt.user.id">
                        <Profilephoto :src="comt.user.src" :size="'25px'"></Profilephoto>
                        {{comt.user.name}}
                    </a>
                    {{comt.body}}                    
                </div>
                <div v-if="auth != null" class="mb-2">
                    <span class="text-muted ml-3">{{moment.utc(comt.created_at).fromNow()}}</span>
                    <button 
                    class="btn btn-link mt-0 ml-2 p-0 font-weight-bold"
                    v-if="comtArr == null || comtArr == '' || !comtArr.includes(auth.id.toString())"
                    @click="like(auth.id, comt.id)"
                    >{{likeStr}}
                    </button>
                    <button 
                    class="btn btn-link mt-0 ml-2 p-0 font-weight-bold"
                    v-else
                    @click="like(auth.id, comt.id)"
                    >Unlike                        
                    </button>
                    <span 
                    class="badge badge-light users-likes"
                    v-if="comtArr.length -1 > 0"
                    data-toggle="popover"
                    data-trigger="hover"
                    data-placement="top" 
                    :data-content="txt" 
                    data-html="true">
                    {{comtArr.length -1}} 
                    </span>
                    <button 
                    id="example"
                    v-if="auth.id == comt.user_id || auth.is_admin == 1" 
                    @click="deleteC(auth.id, comt.id)"          
                    class="btn btn-link mt-0 ml-2 p-0"
                    >Delete
                    </button>  
                </div>        
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';
import Profilephoto from './Profilephoto';

export default {
    name:'Comment',
    props:['comt','auth'],
    components:{Profilephoto},
    data: function(){
        return{
        comtArr:["",],
        likeStr: 'Like',
        txt:'',
        moment: require('moment'),
        }
    },
    mounted: function(){
       if(this.comt.likes != null && this.comt.likes != ''){
           this.comtArr = this.comt.likes.split(',');
       }
       this.usersLikes(this.comtArr);
    },
    methods:{
        like: function(userId, commentId){
        axios.post(`/comments/like/${userId}/${commentId}`)
        .then((response) => {
            if(response.data == 'like'){
                this.comtArr.push(userId.toString())
                this.likeStr = "Unlike";
            }else{
                this.likeStr = "Like"
                let ind = this.comtArr.indexOf(userId.toString());
                this.comtArr.splice(ind, 1)
            }
           // console.log(response)
        })
        },
        deleteC: function(userId, commentId){
           let ask = confirm('Delete your comment');
           if(ask){
               axios.delete(`/comment/destroy/${userId}/${commentId}`)
               .then((response)=>{
                  this.$emit('delItem', response.data)
               }).catch(err => console.log(err))
           }
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
        }
    }
 
}

</script>
<style lang="scss" scoped>
   .main-container{
       transition: 1s;
       .comment-container{
           div:nth-child(1){
             display: inline-block;
             background-color: #F2F3F5;
             margin: 3px;
             border-radius: 5px;
           }
           div:nth-child(2){
           .users-likes{
               cursor: pointer;
           }
           }
       }
   }
</style>