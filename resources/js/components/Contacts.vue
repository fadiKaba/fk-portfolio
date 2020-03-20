<template>
   <div>
    {{getContacts()}}
   </div>    
</template>
<script>

import axios from 'axios';

export default {
    name:'Contacts',
    data: function(){
        return{
        contacts:[],
        }
    },
    methods:{
        getContacts: function(){
        axios.post(`/contacts/cc`)
        .then((response) =>{
            console.log(response)
        })
        }
    }
}
</script>
<style scoped>

</style>