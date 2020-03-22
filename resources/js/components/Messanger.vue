<template>
    <div class="messanger-container">
        <div class="top d-flex my-2"><Profilephoto :src="sender.src" :size="'80px'"></Profilephoto><a :href="'/profile/'+sender.id" class="ml-2 font-weight-bold">{{sender.name}}</a></div>
        <div class="content border-top p-2 p-md-4">
            <div v-for="message in messages" :key="'mes' + message.id">
                    <p :class="message.senderId == auth.id ? 'text-right': 'text-left'">
                        <img 
                        class="rounded-circle"
                        v-if="message.senderId != auth.id && message.senderPhoto != null && message.senderPhoto != ''" 
                        :src="'../photos/'+message.senderPhoto" 
                        :alt="message.senderName" width="50px">
                        <img v-else-if="message.senderId != auth.id && message.senderPhoto == null || message.senderId != auth.id && src != ''" src="/wallpapers/default-user.png" alt="profile photo" width="50px">
                        <span :class="message.senderId == auth.id ? 'greeny': 'grey'" >{{message.message}}</span> 
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
          fullData:[],
          messages:[],
          newMsg:'',
         }
    },
    mounted: function(){

    },
    methods:{
        getSenderMessages(senderId){
            axios.post(`/getuserformessanger/${senderId}`)
            .then((response) => {
                //console.log(response.data);
                this.fullData = response.data;
                this.messages = [];
                response.data.forEach((item)=>{
                   this.messages.push({
                       id: item.id,
                       senderId: item.sender.id,
                       senderName:item.sender.name,
                       senderPhoto: item.sender.src,
                       message:item.message,
                   });
                });
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
                    this.newMsg = '';
                } )
            }           
        }
    },
    watch:{
        sender:function(newVal, oldVal){
        this.getSenderMessages(newVal.id) //this.getSenderMessages(newVal.id)
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