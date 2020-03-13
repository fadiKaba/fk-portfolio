<template>
    <div>
       <footer>
           <p>Green Conversation Allright reserved &copy; 2020</p>
       </footer>
    </div>
</template>
<script>
export default {
    name:'Foot',
}
</script>
<style lang="scss" scoped>

$color1:#fff;
$color2:#3E7828;
div{
    width: 100%;
    position: absolute;
    bottom: 0;
    footer{
      p{
        background-color:$color2;
        color:$color1;
        font-weight: 700;
        text-align: center;
        padding: 20px 0px;
        margin-bottom: 0;
    }
    }
}
    
</style>