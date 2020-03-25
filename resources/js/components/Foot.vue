<template>
    <div class="main-container py-5 mt-3">
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
                        <li class="mt-4 social-container">
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
                       <li><a href="/contact">Contact</a></li>
                       <li>Terms & Condition</li>
                   </ul>
               </div>
               <div class="col-md-4">
                   <ul>
                       <li class="mb-3 font-weight-bold title">Menu</li>
                       <li><a href="/">Home</a></li>
                       <li><a href="/home">Blog</a></li>
                       <li><a href="/about">About</a></li>
                       <li><a href="/contact">Contact</a></li>
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
    mounted: function(){
    this.showAn('.social-container > a > img');
    },
    methods:{
        showAn: function(ele){
          // document.querySelector(ele).style.opacity = '0'
          let time = 100; 
          var observer = new IntersectionObserver(function(entries) {
            if(entries[0].isIntersecting === true)
           document.querySelectorAll(ele).forEach((item) => {                       
             setTimeout(()=>{
               item.classList.add('d-opacity'); 
             }, time)
             time+=100;     
           });
          }, { threshold: [1] });
          
          observer.observe(document.querySelector(ele));
        },
    }
}
</script>
<style lang="scss" scoped>

$color1:#F7F6F2;
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
                    a{
                        color: #000;
                        img{
                            opacity:0;                            
                        }
                    }
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

.d-opacity{
    animation: opacity 0.3s ease-in;
    animation-fill-mode: forwards;
}

@keyframes opacity {
    0%{
      opacity: 0;
      transform: translate(0, 20px);
    }
    100%{
      opacity: 1;
      transform: translate(0, 0px);
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