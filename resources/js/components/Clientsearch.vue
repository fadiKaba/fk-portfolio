<template>
    <div class="main-search-container">
        <div class="input-group mb-0">
            <input 
            type="text" 
            class="form-control" 
            v-model="val"
            @keyup="search(val)"
            placeholder="Search e-mail" 
            aria-label="Recipient's username" 
            aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
        <div class="search-result-container">
            <ul class="list-group" v-if="results.length > 0">
                <li 
                class="list-group-item py-2" 
                v-for="result in results" 
                :key="'r'+result.id" 
                @click="sendSearch(result)">
                   <a :href="'/profile/'+ result.id">{{result.name}} <span class="text-dark"> {{result.email}}</span></a> 
                </li>
            </ul>
        </div>
    </div>
    
</template>
<script>

import axios from 'axios';

export default {
    name:'Clientsearch',
    data: function(){
        return {
        val: '',
        results: ''
        }
    },
    methods:{
        search: function(str){
            if(this.val == ''){
                this.results = '';
            }else{
               axios.post(`/clientsearch/${str}`)
            .then((response)=>{
            this.results = response.data;
            }) 
            }
            
        },
        sendSearch: function(sender){
        this.$emit('searchsender', sender)
        }
    }
}
</script>
<style lang="scss" scoped>
.main-search-container{
   .search-result-container{
      ul.list-group{
          position: absolute;
          z-index: 2;
          max-height: 30vh;
          overflow-y: scroll;
          scrollbar-width: thin;
      li{
          cursor: pointer;
        &:hover{
            background-color: #f4f4f4;
        }       
      }
    } 
   }
}
    
</style>