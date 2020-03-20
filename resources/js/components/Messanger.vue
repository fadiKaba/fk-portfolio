<template>
    <div class="messanger-container">
        <div class="top d-flex my-2"><Profilephoto :src="sender.src" :size="'80px'"></Profilephoto><a :href="'/profile/'+sender.id" class="ml-2 font-weight-bold">{{sender.name}}</a></div>
        <div class="content border-top p-2 p-md-4">
            <div v-for="message in messages" :key="'mes' + message.id">
                    <p :class="message.sender.id == auth.id ? 'text-right': 'text-left'">
                        <img 
                        class="rounded-circle"
                        v-if="message.sender.id != auth.id && message.sender.src != null && message.sender.src != ''" 
                        :src="'../photos/'+message.sender.src" 
                        :alt="message.sender.name" width="50px">
                        <img v-else-if="message.sender.id != auth.id && message.sender.src == null || message.sender.id != auth.id && src != ''" src="/wallpapers/default-user.png" alt="profile photo" width="50px">
                        <span :class="message.sender.id == auth.id ? 'greeny': 'grey'" >{{message.message}}</span> 
                    </p>                                                 
            </div>
        </div>
        <div class="messenger-input" v-if="messages.length > 0">
            <div class="input-group mb-3">
                <input type="text" 
                class="form-control" 
                placeholder="Message" 
                aria-label="Write a message" 
                aria-describedby="button-addon2"
                @keyup.enter="newMessage(sender.id, auth.id, newMsg)"
                v-model="newMsg">
                <div class="input-group-append">
                    <button 
                    class="btn btn-outline-secondary" 
                    type="button" 
                    id="button-addon2"
                    @click="newMessage(sender.id, auth.id, newMsg)">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import Profilephoto from './Profilephoto';
import axios from 'axios';

export default {
    name:'Messanger',
    components:{Profilephoto},
    props:['auth','sender'],
    data: function(){
         return{
          messages:[],
          newMsg:'',
         }
    },
    methods:{
        getSenderMessages(senderId){
            axios.post(`/getuserformessanger/${senderId}`)
            .then((response) => {
                this.messages = response.data
            })
        },
        newMessage(senderId, authId, message){
            if(message != ''){
                 axios.post('/message/new', {
                'from': authId,
                'to': senderId,
                'message': message,
                'is_read': 0
                }).then( (response) => {
                    console.log(response)
                    this.newMsg = '';
                } )
            }           
        }
    },
    watch:{
        sender:function(newVal, oldVal){
         this.getSenderMessages(newVal.id)
        }
    }
}
</script>
<style lang="scss" scoped>
 .messanger-container{
     .top{
        a{
            text-transform: capitalize;
            font-size: 1.4rem;
        }
     }
     .content{
         max-height: 60vh;
         div{
             p{
                 span{
                     padding:8px;
                     border-radius: 5px;
                    // max-width: 50px;
                 }
             }
         }
         
     }
 }

 .grey{
     background-color: #F2F3F5;
 }
 .greeny{
     background-color: #82AE46;
     color: #fff;
 }
</style>