<template>
    <a class="btn-main" :href="btnPath">
        <div>
            <div>
                <img :src="iconPath">
            </div>
            <div>
                <span>{{btnName}}</span>
            </div>
        </div>
    </a>
</template>
<script>
export default {
    name:"Mainbtn",
    props:['iconPath','btnPath', 'btnName'],
    data: function(){
        return{
            
        }
    },
}
</script>
<style lang="scss" scoped>

.btn-main{
    background-color: #fff;
    border-radius: 20px;
    margin: 5px 10px;
    padding: 2px;
    div{
        border-radius: 20px;
        background-color: #fff;
        display: grid;
        grid-template-columns: 1fr 3fr;
        justify-items: center;
        div:nth-child(1){
            background-color: #72d484;
            display: flex;
            padding: 5px;
            img{
                width:25px;
                border-radius: 20px;
            }
        }
        div:nth-child(2){
            background-color: #fff;
            color: #72d484;
            font-weight: 700;
            display: flex;
            padding: 5px;
        }
    }
    &:hover{
        div{

            div:nth-child(1){
                animation: grow 2s ease-in-out;
                
            }
            div:nth-child(2){
                animation: shrink 2s ease-in-out;
            }
        }
    }
}


@keyframes grow{
    0%{
            width: 40px;
    }
    100%{
            width: 150px;
    }
}
@keyframes shrink{
    0%{
            width: 100px;
    }
    100%{
            width: 0px;
    }
}

</style>