<template>
    <button class="btn text-light">
        <img :src="icon" alt="" width="25px"> {{name}}
    </button>
</template>
<script>
export default {
   name:'Normalbtn', 
   props:['name','url','icon'],   
}
</script>
<style scoped>

</style>