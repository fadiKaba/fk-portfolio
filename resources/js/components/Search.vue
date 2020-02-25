<template>
    <form class="form-inline my-2 my-lg-0 ml-md-5">
        <input @keyup="startSearch(sVal)" v-model="sVal" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        {{sVal}}
    </form>
</template>
<script>

import axios from 'axios';

export default {
    name:'Search',
    data: function(){
        return {
            sVal:''
        }
    },
    methods:{
        startSearch: function(val){
            axios.get('/adminusers/search/'+this.sVal).
            then((response)=>{
                console.log(response.data)
            })
        },
    }
}
</script>
<style scoped>

</style>