<template>
   <div>
       <div>
           <form class="form-inline my-2 my-lg-0 ml-md-5" :action="res" method="POST">
                <input 
                autocomplete="off" 
                list="search-result" 
                @keyup="startSearch(sVal)" 
                v-model="sVal" 
                class="form-control mr-sm-2" 
                type="search" 
                placeholder="Search" 
                aria-label="Search"
                name="sresult">
                <button class="btn my-2 my-sm-0" type="submit">Search</button>
                <datalist id="search-result">
                    <option 
                    v-for="result in results" 
                    :key="result.id"
                    :value="result.email||result.post_title"
                    >
                    {{result.email || result.post_title}}<span>{{result.name}}</span>
                    </option>
                </datalist> 
                <slot></slot>            
           </form>
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
            axios.get(this.url+ '/' +this.sVal).
            then((response)=>{
                this.results = response.data;
            })
        },
        goToRes(id){
            console.log(id)
        }
    }
}
</script>
<style scoped>
button{
    background-color:#294222;
    color:#fff;
}
</style>