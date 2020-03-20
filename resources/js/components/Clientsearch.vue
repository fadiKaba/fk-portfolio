<template>
    <div>
        <div class="input-group mb-3">
            <input 
            type="text" 
            class="form-control" 
            v-model="val"
            @keyup="search(val)"
            placeholder="Recipient's username" 
            aria-label="Recipient's username" 
            aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
        <div>
            <ul v-if="results.length > 0">
                <li v-for="result in results" :key="'r'+result.id">{{result.email}}</li>
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
        axios.post(`/clientsearch/${str}`)
        .then((response)=>{
        this.results = response.data;
        })
        }
    }
}
</script>
<style lang="scss" scoped>
    ul.list-group{
      li{
          form{
             button{
            &:hover{
                color: #82AE46;
            }
        }
          }
        
      }
  }
</style>