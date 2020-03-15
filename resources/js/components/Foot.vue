<template>
    <div class="main-container py-5">
        <div class="arrow-container text-center">
            <a @click="window.scrollTo(x-coord, y-coord);" href="#"><img src="/ico/up-arrow.svg" alt="" width="40px"></a>
        </div>       
       <footer>
           <div class="row jusify-content-center container m-auto py-3">
               <div class="col-md-4">
                   <ul>
                       <li class="mb-3 font-weight-bold title">Green Conversation</li>
                       <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                           Quam quod doloribus laborum neque provident eligendi!
                        </li>
                        <li class="mt-4">
                            <a href="#" class="mr-3"><img src="/ico/facebook.svg" width="35px"></a>
                            <a href="#" class="mr-3"><img src="/ico/twitter.svg" width="35px"></a>
                            <a href="#" class="mr-3"><img src="/ico/instagram.svg" width="35px"></a>
                        </li>
                   </ul>
               </div>        
                <div class="col-md-4">
                   <ul>
                       <li class="mb-3 font-weight-bold title">Help</li>
                       <li>Privicy policy</li>
                       <li>Contact</li>
                       <li>Terms & Condition</li>
                   </ul>
               </div>
               <div class="col-md-4">
                   <ul>
                       <li class="mb-3 font-weight-bold title">Menu</li>
                       <li>Blog</li>
                       <li>About</li>
                       <li>Contact</li>
                   </ul>
               </div>
            </div>
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
$color2:#82AE46;
.main-container{
    width: 100%;
    color:#000;
    background-color:$color1;
    .arrow-container{
        margin-top:-65px;
        a{
           background-color: $color2;
           padding: 20px 10px;
           border-radius: 50%;
           img{
               animation: moveUp 1s infinite linear;
           };
        }      
    }
    footer{
            ul{
                list-style-type: none;
                li{
                    &.title{
                        font-size: 1.2;
                    }
                }
            }
      p{   
        font-weight: 700;
        text-align: center;
        padding: 20px 0px;
        margin-bottom: 0;
    }
    }
}
@keyframes moveUp {
    0%{
        transform: translate(0);
    }
    100%{
        transform: translate(0,-10px);
    }
}    
</style>