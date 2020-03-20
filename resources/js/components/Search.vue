<template>
   <div class="mt-md-5">
        <form class="my-2 my-lg-0" :action="res" method="POST">
            <div class="input-group mb-1">
                <input 
                autocomplete="off" 
                @keyup="startSearch(sVal)" 
                v-model="sVal" 
                class="form-control" 
                type="search" 
                placeholder="Search" 
                aria-label="Search"
                aria-describedby="button-addon2"
                name="sresult">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>                                
            </div>                           
            <slot></slot>            
        </form>
        <div>              
            <ul class="list-group" v-if="results.length > 0">
                <li class="list-group-item p-0" v-for="result in results" :key="result.id">
                    <form :action="res" method="POST">
                    <input type="hidden" name="sresult" :value="result.email||result.post_title">
                    <button class="btn" type="submit">{{result.email || result.post_title}}<span>{{result.name}}</span></button>
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
    name:'Search',
    props:['url','res'],
    data: function(){
        return {
            sVal:'',
            results:'',
        }
    },
    methods:{
        startSearch: function(val){
            this.sVal == ''? this.results = []:'';
            if(this.sVal != ''){
               axios.get(this.url+ '/' +this.sVal).
               then((response)=>{
                    this.results = response.data;
            })
            }
        },
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