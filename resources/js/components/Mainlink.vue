<template>
    <a class="btn-main btn " :href="btnPath">
        <div>
            <div>
                <img :src="iconPath" width="30px">
            </div>
            <div>
                <span class="text-light">{{btnName}}</span>
            </div>
        </div>
    </a>
</template>
<script>
export default {
    name:"Mainlink",
    props:['iconPath','btnPath', 'btnName'],
    data: function(){
        return{
            
        }
    },
}
</script>
<style lang="scss" scoped>
// $color1:#3E7828;
// $color2:#fff;
// .btn-main{
//     background-color: $color2;
//     border-radius: 20px;
//     margin: 5px 10px;
//     padding: 2px;
//     text-decoration: none;
//     display: inline-block;
//     div{
//         border-radius: 20px;
//         background-color: $color2;
//         display: grid;
//         grid-template-columns: 1fr 3fr;
//         justify-items: center;
//         transition: 0.2s;
//         div:nth-child(1){
//             background-color: $color1;
//             display: flex;
//             padding: 5px;
//             img{
//                 width:25px;
//                 border-radius: 20px;
//             }
//         }
//         div:nth-child(2){
//             background-color: $color2;
//             color: $color1;
//             font-weight: 700;
//             display: flex;
//             padding: 5px;
//             transition: 0.2s;
//         }
//     }
//     &:hover{
//         div{
//             background-color:$color1;
//             div:nth-child(1){
                
                
//             }
//             div:nth-child(2){
//                 background-color:$color1;
//                 color: $color2;
//             }
//         }
//     }
// }


// @keyframes grow{
//     0%{
//             width: 40px;
//     }
//     100%{
//             width: 150px;
//     }
// }
// @keyframes shrink{
//     0%{
//             width: 100px;
//     }
//     100%{
//             width: 0px;
//     }
// }

</style>