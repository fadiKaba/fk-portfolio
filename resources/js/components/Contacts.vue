<template>
   <div class="contacts-container">
    <div v-if="contacts.length > 0" class="my-2 contacts-container-inner">
        <div 
        class="d-flex align-items-center p-2 contact" 
        v-for="contact in contacts" 
        :key="'con' + contact.id"
        :id="'co'+contact.id"
        > 
            <!-- deleteContact(contact.id, contact.name) -->
            <span class="badge badge-info text-light mr-1" v-if="contact.nouvau == true">!</span>
            <div class="d-flex" @click="sendSender(contact, 'co'+contact.id)" :data-toggle="small == true ? 'modal': ''" :data-target="small == true ? '#mobile-messenger': ''">        
                <Profilephoto :src="contact.src" :cls="'mr-2'" :size="'25px'"></Profilephoto> 
                <p class="m-0"> {{contact.name.slice(0,9)}} </p> 
            </div>                 
                <button  @click="deleteContact(contact.id, contact.name)" type="button" class="close ml-auto">
                    <span aria-hidden="true">&times;</span>
                </button>                            
        </div>
    </div>
    <div v-else class="text-muted mt-3 text-center">
        <img src="/ico/qa.svg" alt="" width="50%">
        <p class="mt-2">No opened conversations</p>       
    </div>
   </div>    
</template>
<script>

import axios from 'axios';
import Profilephoto from './Profilephoto';
export default {
    name:'Contacts',
    components:{Profilephoto},
    props:['auth','senderFromApp','small'],
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
                this.fullData = response.data; 
                this.fullData.forEach((item) =>{
                    if(item.is_read == 0 && item.sender.id != this.auth.id && this.auth.id != item.deleted){
                        item.sender.nouvau = true;
                        this.$emit('newmessage', true);
                    }   
                 })
                this.fullData.forEach((item) =>{ 
                    if(item.sender.nouvau == true && this.contacts.find( x => x.id == item.sender.id) == undefined 
                    && item.sender.id != this.auth.id && this.auth.id != item.deleted){
                        this.contacts.push(item.sender); 
                    } 
                    if(this.contacts.find( x => x.id == item.reciever.id) == undefined 
                    && item.reciever.id != this.auth.id && this.auth.id != item.deleted){
                        this.contacts.push(item.reciever); 
                    } 
                })
                this.fullData.forEach((item) =>{                                                        
                    if(this.contacts.find( x => x.id == item.sender.id) == undefined 
                    && item.sender.id != this.auth.id && this.auth.id != item.deleted){
                        this.contacts.push(item.sender); 
                    }                                                             
                })
            })
        },
        sendSender: function(sender, id){
            this.$emit('snedsender', sender);
            axios.post(`/message/makeread/${sender.id}`);
            document.querySelectorAll('.contact').forEach(item => item.setAttribute('style', 'background-color: #fff; color: #000;'));
            document.querySelector(`#${id}`).setAttribute('style', 'background-color: #82AE46; color: #fff;');
        },
        deleteContact: function(senderId, name){
            let confirmDelete = confirm('Are you sure to delete your conversation with '+ name);
            if(confirmDelete){
               axios.delete(`/messages/destroy/${senderId}`)
                .then((response) =>{
                for(let i = 0; i < this.contacts.length; i++){
                    if(this.contacts[i].name == name){
                        this.contacts.splice(i, 1);
                    }
                }               
                this.$emit('clearmessenger', senderId);
                }); 
            }          
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
            div{
               transition: 0.2s;
               cursor: pointer;
                &:hover{
                    transform: scale(1.1);
                }
            p{
                text-transform: capitalize;
            } 
            }
            
        }
    }
}
</style>