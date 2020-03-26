<template>
    <div class="main-search-container">
        <div class="input-group mb-0">
            <input 
            type="text" 
            class="form-control rounded-0" 
            v-model="val"
            @keyup="search(val)"
            placeholder="Search e-mail" 
            aria-label="Recipient's username" 
            aria-describedby="button-addon2">
        </div>
        <div class="search-result-container">
            <ul class="list-group" v-if="results.length > 0">
                <li 
                class="list-group-item py-2 border-0" 
                v-for="result in results" 
                :key="'r'+result.id" 
                >
                   <a :href="'/profile/'+ result.id">
                   <img class="rounded-circle" v-if="result.src != null && result.src != ''" :src="'/photos/' + result.src" alt="profile photo" width="25px">
                   <img class="rounded-circle" v-else src="/wallpapers/default-user.png" alt="profile photo" width="25px">
                   <span> {{result.name}} </span>
                   <span class="text-dark" v-if="result.hide_email != '1'">{{result.email}}</span></a> 
                   | <button class="btn" @click="sendSearch(result)">Open conversation</button>
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
        this.$emit('newconversation', sender);
        this.val= '';
        this.results = '';
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
        button{
            color:#82AE46;
            &:hover{
                background-color: #82AE46;
                color:#f4f4f4;
            }
        }       
      }
    } 
   }
}
    
</style>