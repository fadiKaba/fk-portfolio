<template>
   <div>
       <div>
           <form class="form-inline my-2 my-lg-0 ml-md-5" action="/adminusers/gotosearch" method="POST">
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
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                <datalist id="search-result">
                    <option 
                    v-for="result in results" 
                    :key="result.id"
                    :value="result.email"
                    >
                    {{result.email}} {{result.name}}
                    </option>
                </datalist> 
                <slot></slot>            
           </form>
       </div>      
      <!-- <div>
           <ul class="list-group list-group-flush">
               <li class="list-group-item" v-for="result in results" :key="result.id">{{result.email}} {{result.name}}</li>
           </ul>
       </div> -->
   </div>   
</template>
<script>

import axios from 'axios';

export default {
    name:'Search',
    data: function(){
        return {
            sVal:'',
            results:''
        }
    },
    methods:{
        startSearch: function(val){
            axios.get('/adminusers/search/'+this.sVal).
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

</style>