<template>
   <div class="contacts-container">
    <div class="my-2 border contacts-container-inner">
        <div 
        class="d-flex align-items-center border-bottom p-2" 
        v-for="contact in contacts" 
        :key="'con' + contact.id"
        @click="sendSender(contact)">
            <!-- <span class="badge badge-info text-light mr-1" v-if="contact.nouvau == true">!</span>  -->
            <Profilephoto :src="contact.src" :cls="'mr-2'" :size="'25px'"></Profilephoto> 
            <p class="m-0"> {{contact.name}} </p>                             
        </div>
    </div>
   </div>    
</template>
<script>

import axios from 'axios';
import Profilephoto from './Profilephoto';
export default {
    name:'Contacts',
    components:{Profilephoto},
    props:['auth','senderFromApp'],
    data: function(){
        return{
        fullData:[],
        contacts:[]
        }
    },
    mounted: function(){
     this.getContacts();
    },
    methods:{
        getContacts: function(){
            
            axios.post(`/contacts`)
            .then((response) =>{
                response.data.forEach((item) =>{   
                    if(this.contacts.find( x => x.id == item.sender.id) == undefined && item.sender.id != this.auth.id){
                        if(item.is_read == 0){
                            item.sender.nouvau = true;
                        }
                        this.contacts.push(item.sender); 
                    }else if(this.contacts.find( x => x.id == item.reciever.id) == undefined && item.reciever.id != this.auth.id){
                        this.contacts.push(item.reciever); 
                    }                       
                })
            })
        },
        sendSender: function(sender){
            this.$emit('snedsender', sender)
            axios.post(`/message/makeread/${sender.id}`)
        },
    },
}
</script>
<style lang="scss" scoped>
.contacts-container{
    .contacts-container-inner{
        max-height: 60vh;
        overflow-y:scroll;
        scrollbar-width: thin;
        div{
            cursor: pointer;
            p{
                text-transform: capitalize;
            }
        }
    }
}
</style>