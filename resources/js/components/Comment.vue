<template>
    <div class="main-container">
        <div class="input-group mb-3">
                <input 
                type="text" 
                class="form-control" 
                placeholder="Recipient's username" 
                aria-label="Recipient's username" 
                aria-describedby="button-addon2"
                v-model="body" row="5">
            <div class="input-group-append">
                <button 
                class="btn btn-light" 
                type="button" 
                id="button-addon2"
                @click="addComment()">
                Comment
                </button>
            </div>
        </div>
        <div>
            <div class="comment-container" v-for="com in comts" :key="com.id">
                <div class="p-1 p-md-2 m-0">
                    <a class="font-weight-bold d-block" href="#">{{user.name}}</a>
                    {{com.body}}
                </div>
                <div class="mb-2">
                  <button class="btn btn-link mt-0 p-0">Like</button> 
                  <span class="text-muted ml-3">4 hours ago</span> 
                </div>               
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    name:'Comment',
    props:['user', 'userName', 'postId', 'comments'],
    data: function(){
        return{
            body:'',
            comts:this.comments
        }
    },
    mounted: function(){
     //console.log(this.comments);
    },
    methods:{
        addComment: function(){
            axios.post(`comments/add/${this.user.id}/${this.postId}`,{
                'body': this.body,
            })
            .then((response)=>{
                this.body = '';
                this.comts.unshift(response.data);
                console.log(response.data)
            })
        }
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