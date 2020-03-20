<template>
    <div>
        <div class="input-group mb-0">
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
            <ul class="list-group" v-if="results.length > 0">
                <li class="list-group-item p-0" v-for="result in results" :key="'r'+result.id">
                    <form method="POST">
                    <input type="hidden" name="sresult" :value="result.email||result.name">
                    <button class="btn" type="submit">{{result.name}} <span class="text-primary"> {{result.email}}</span></button>
                    <slot></slot> 
                    </form> 
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
            }
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