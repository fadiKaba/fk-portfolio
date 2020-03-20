<template>
    <div :class="cls">
        <img class="rounded-circle" v-if="src != null && src != ''" :src="'/photos/' + src" alt="profile photo" :width="size">
        <img v-else src="/wallpapers/default-user.png" alt="profile photo" :width="size">
    </div>  
</template>
<script>
export default {
    name:'Profilephoto',
    props:['src', 'cls', 'size'],
    
}
</script>
<style scoped>

</style>