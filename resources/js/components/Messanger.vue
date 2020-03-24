<template>
    <div class="messanger-container">
        <div class="top d-flex my-2">
            <Profilephoto :src="senr.src" :size="'80px'"></Profilephoto>
            <a :href="'/profile/'+senr.id" class="ml-2 font-weight-bold">{{senr.name}}</a>
            <button class="btn text-danger err-spiner m-auto" type="button" disabled>
                <span class="spinner-border spinner-border" role="status" aria-hidden="true"></span>
                Connecting...
            </button>
            <span class="spinner-border loding-spiner text-primary ml-auto" role="status" aria-hidden="true"></span>
        </div>
        <div class="content border-top p-2 p-md-4" v-chat-scroll="{always: false, smooth: true, smoothonremoved: false}">
            <ul class="p-0">
            <li  v-for="message in messages" class="message" :key="'mes' + message.id">
                <p :class="message.senderId == auth.id ? 'text-right': 'text-left'">
                    <img 
                    class="rounded-circle"
                    v-if="message.senderId != auth.id && message.senderPhoto != null && message.senderPhoto != ''" 
                    :src="'../photos/'+message.senderPhoto" 
                    :alt="message.senderName" width="50px">
                    <img v-else-if="message.senderId != auth.id && message.senderPhoto == null || message.senderId != auth.id && message.senderPhoto != ''" src="/wallpapers/default-user.png" alt="profile photo" width="50px">
                    <span :class="message.senderId == auth.id ? 'greeny': 'grey'" >{{message.message}}</span> 
                </p>                                                 
            </li>
            </ul>
        </div>
        <div class="messenger-input" v-if="messages.length > 0">
            <div class="input-group mb-3">
                <input type="text" 
                class="form-control rounded-0" 
                placeholder="Message" 
                aria-label="Write a message" 
                aria-describedby="button-addon2"
                @keyup.enter="newMessage(senr.id, auth.id, newMsg)"
                v-model="newMsg">
                <div class="input-group-append">
                    <button 
                    class="btn btn-outline-secondary rounded-0" 
                    type="button" 
                    id="button-addon2"
                    @click="newMessage(senr.id, auth.id, newMsg)">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import Profilephoto from './Profilephoto';
import axios from 'axios';
import Echo from 'laravel-echo';
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)

window.Pusher = require('pusher-js');

//Pusher.logToConsole = true;




export default {
    name:'Messanger',
    components:{Profilephoto},
    props:['auth','sender', 'clear'],
    data: function(){
         return{
          fullData:[],
          messages:[],
          newMsg:'',
          senr:this.sender,
          err:''
         }
    },
    mounted: function(){      
        if(this.auth != null){
            window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'efced963ebdfef1133e1',
        cluster: 'eu',
        encrypted: true,
        authEndpoint: '/broadcasting/auth'
        });
        window.Echo.private('green.'+this.auth.id)        
            .listen('MessengerEvent', (e)=>{
                if(this.fullData.length > 0){
                   this.messages.push({
                    id: e.message.id,
                    senderId: e.message.from,
                    senderName:e.name,
                    senderPhoto: e.src,
                    message:e.message.message,
                   });                  
                }           
            this.$emit('newmessage','true');
            })
        };
        setInterval(function(){
           axios.get('/').then(response => document.querySelector('.err-spiner').style.display = 'none' ) 
        },5000)
        
    
    },
    methods:{
        getSenderMessages(senderId){
            document.querySelector('.loding-spiner').style.display = 'block';
            axios.post(`/getuserformessanger/${senderId}`)
            .then((response) => {
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
            }).then((e) => {
                   var messageBody = document.querySelector('.content');
                   messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                   document.querySelector('.loding-spiner').style.display = 'none';
                   document.querySelector('.err-spiner').style.display = 'none';
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
                    this.messages.push({
                       id: response.data.id,
                       senderId: this.auth.id,
                       senderName:this.auth.name,
                       senderPhoto: '',
                       message:response.data.message,
                   });
                   document.querySelector('.err-spiner').style.display = 'none';
                } ).catch((err) => {
                   if(err.request){
                       this.err = 'Connection Error';
                       document.querySelector('.err-spiner').style.display = 'block';
                   }
                })                 
            }           
        }
    },
    watch:{
        sender:function(newVal, oldVal){
        this.getSenderMessages(newVal.id) 
        this.senr = this.sender;     
        },
        clear: function(newVal, oldVal){
            this.messages=[];
            this.senr = '';
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
         max-height: 50vh;
         overflow-y:scroll;
         scrollbar-width: thin;
         margin-bottom: 5px;
         ul{
             list-style: none;
             li{
                
                p{ 
                 span{max-width: 50%;
                     padding:8px;
                     border-radius: 5px;
                     display: inline-block;
                     word-wrap: break-word;
                    // max-width: 50px;
                 }
             }
             }             
         }        
     }
 }

.loding-spiner{
    display: none;
}
.err-spiner{
    display: none;
}
 .grey{
     background-color: #F2F3F5;
 }
 .greeny{
     background-color: #82AE46;
     color: #fff;
 }
</style>