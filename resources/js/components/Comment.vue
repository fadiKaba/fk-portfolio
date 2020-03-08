<template>
    <div class="main-container">
        <div>
            <div class="comment-container">
                <div class="p-1 p-md-2 m-0">
                    <a class="font-weight-bold d-block" href="#">{{comt.user.name}}</a>
                    {{comt.body}}                    
                </div>
                <div class="mb-2">
                    <span class="text-muted ml-3">4 hours ago</span>
                    <button 
                    class="btn btn-link mt-0 ml-2 p-0 font-weight-bold"
                    v-if="comtArr == null || comtArr == '' || !comtArr.includes(auth.id.toString())"
                    @click="like(auth.id, comt.id)"
                    >{{likeStr}}
                        <span 
                        class="badge badge-light"
                        v-if="comtArr.length -1 > 0">
                        {{comtArr.length -1 != 0 ? comtArr.length -1: ''}} 
                        </span>
                    </button>
                    <button 
                    class="btn btn-link mt-0 ml-2 p-0 font-weight-bold"
                    v-else
                    @click="like(auth.id, comt.id)"
                    >Unlike 
                        <span 
                        class="badge badge-light"
                        v-if="comtArr.length -1 > 0">
                        {{comtArr.length -1}} 
                        </span>
                    </button>
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

export default {
    name:'Comment',
    props:['comt','auth'],
    data: function(){
        return{
        comtArr:["",],
        likeStr: 'Like',
        }
    },
    mounted: function(){
       if(this.comt.likes != null && this.comt.likes != ''){
           this.comtArr = this.comt.likes.split(',');
       }
    },
    methods:{
        like: function(userId, commentId){
        axios.post(`/comments/like/${userId}/${commentId}`)
        .then((response) => {
            if(response.data == 'like'){
                this.comtArr.push(this.auth.id.toString())
                this.likeStr = "Unlike";
            }else{
                this.likeStr = "Like"
                let ind = this.comtArr.indexOf(this.auth.id.toString());
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
    }
 
}
</script>
<style lang="scss" scoped>
   .main-container{
       .comment-container{
           div:nth-child(1){
             display: inline-block;
             background-color: #F2F3F5;
             margin: 3px;
             border-radius: 5px;
           }
           div:nth-child(2){

           }
       }
   }
</style>