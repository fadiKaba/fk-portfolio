<template>
    <div class="messanger-container">
        <div class="top">img + name</div>
        <div class="content border-top">
            <div >
                {{sender}}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'Messanger',
    props:['auth','sender'],
}
</script>
<style lang="scss" scoped>
 .messanger-container{
     .top{

     }
     .content{
         max-height: 60vh;
     }
 }
</style>