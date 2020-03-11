<template>
    <div class="cyrcle">
        <div  :class="ann" @mousemove="ann = 'outer-cyrcle'" @mouseout="ann = 'outer-cyrcle borderShad'">
            <div id="gear" class="inner-cyrcle">
                <span @click="returnBack(cyrclePath)">{{cyrcleName}}</span>
                <span @click="returnBack(cyrclePath)">{{cyrcleName}}</span>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name:'Cyrcle',
    props:['cyrcleName','cyrclePath'],
    data: function(){
        return{
            ann:'outer-cyrcle borderShad'
        }
    },
    mounted:function(){
        $(window).bind("pageshow", function(event) {
        if (event.originalEvent.persisted) {
            window.location.reload(); 
                }  
            });
    },
    methods:{
        returnBack: function(urlH){
        let di = document.querySelector('#gear');
        let sp = document.querySelector('#gear > span');
        di.style.transform="rotateZ(-90deg)";
        sp.style.transform="scale(0)";    
        setTimeout(()=>{
            window.location = urlH
        },700)
        }
    }
}
</script>
<style lang="scss" scoped>
$color1:#8DBB23;
$color2:#fff;
$color4:#5B5C54;
$colors:#678720;
$colort:#66872083;

$outerCyrcleWH: 240px;
$innerCyrcleWH: 230px;

.cyrcle{
    display:flex;
    height: 80vh;
    .outer-cyrcle{
        display: flex;
        align-items: center;
        justify-content: center;
        width:$outerCyrcleWH;
        height: $outerCyrcleWH;
        background-color: #fff;     
        margin:auto;
        border-radius: 50%;    
        box-shadow: 0 0 0pt 2pt $color1;
        transition: 0.2s;  
        .inner-cyrcle{
            display: flex;
        align-items: center;
        justify-content: center;
          width:$innerCyrcleWH;
          height: $innerCyrcleWH; 
          border: 10px #fff dashed;
          border-radius: 50%;
          background-image: radial-gradient(circle,$color1, $colors);
          transition: 0.7s;
          span:nth-child(1){
              color: #fff;
              font-weight: bold;
              font-size: 1.2rem;
          }
          span:nth-child(2){
              display: none;
              background-color: #fff;
              color: $color1;
              font-weight: bolder;
              font-size: 1.2rem;
              text-decoration: none;
              padding: 25px; 
              transform: scale(0) rotateZ(-90deg);
              border-radius: 50%;
              transition: 0.7s;
              cursor: pointer;
          }   
        }
        &:hover{
            box-shadow: 0 0 0pt 20pt $colort;
            .inner-cyrcle{
                transform: rotateZ(90deg);
                background-color: transparent;
                span:nth-child(1){
                display: none;
                }
                span:nth-child(2){
                display: block;
                transform: scale(1) rotateZ(-90deg);
                }
            }
        }
    }
    
    
}

.borderShad{
   animation: borderShadow 4s linear infinite ;
}
.returnB{
    display: none;
}

@keyframes borderShadow{
    0%{
      box-shadow: 0 0 0pt 20pt $colort;
    }
    30%{
      box-shadow: 0 0 0pt 10pt $colort;
    }
    60%{
      box-shadow: 0 0 0pt 30pt $colort;
    }
    80%{
      box-shadow: 0 0 0pt 15pt $colort; 
    }
    100%{
      box-shadow: 0 0 0pt 20pt $colort;
    }   
}

@keyframes border{
    0%{

    }
    100%{

    }
}


@media screen and (min-width:600px){
  .cyrcle > .outer-cyrcle {
        background-image:url("/wallpapers/city-round.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 231px;
        height: 231px;
        &:hover{
      width: 400px;
        height: 400px;
  }
  }
}

@media screen and (max-width: 600px){
    .cyrcle > .outer-cyrcle > #gear > span{
        transform: scale(1) rotateZ(0deg);
    }
}
</style>