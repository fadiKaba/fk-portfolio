<template>
   <div class="contacts-container">
    <div class="my-2 border contacts-container-inner">
        <div 
        class="d-flex align-items-center border-bottom p-2" 
        v-for="contact in contacts" 
        :key="'con' + contact.id"
        @click="sendSender(contact.sender)">
            <Profilephoto :src="contact.sender.src" :cls="'mr-2'"></Profilephoto> 
            <p class="m-0">{{contact.sender.name}}</p>                  
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
    props:['auth'],
    data: function(){
        return{
        contacts:[],
        }
    },
    mounted: function(){
     this.getContacts();
    },
    methods:{
        getContacts: function(){
        axios.post(`/contacts/${this.auth.id}`)
        .then((response) =>{
            response.data.forEach((item) =>{                   
                   if(this.contacts.find( x => x.id == item.sender.id) == undefined){
                      this.contacts.push(item); 
                   }
                
            })
        })
        },
        sendSender: function(sender){
            this.$emit('snedsender', sender)

            // axios.post(`/getuserformessanger/${senderId}`)
            // .then((response) => {
            //     this.$emit('messageswithuser', response.data)
            //     //console.log(response.data);
            // })

        }
    }
}
</script>
<style lang="scss" scoped>
.contacts-container{
    .contacts-container-inner{
        max-height: 60vh;
        overflow-y:scroll;
    }
}
</style>