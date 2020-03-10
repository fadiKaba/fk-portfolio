<template>
    <div :class="cls">
        <img class="rounded-circle" v-if="src != null && src != ''" :src="'/photos/' + src" alt="profile photo" width="25px">
        <img v-else src="/wallpapers/default-user.png" alt="profile photo" width="25px">
    </div>  
</template>
<script>
export default {
    name:'Profilephoto',
    props:['src', 'cls'],
    
}
</script>
<style scoped>

</style>