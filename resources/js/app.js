/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Mainlink from "./components/Mainlink";
import Cyrcle from "./components/Cyrcle";
import Foot from "./components/Foot";
import Mainpost from "./components/Mainpost";
import Search from "./components/Search";
import Modal from './components/Modal';
import Profilephoto from './components/Profilephoto';

$(function () {
    $('[data-toggle="popover"]').popover()
  })

const app = new Vue({
    el: '#app',
    components:{Mainlink,Cyrcle,Foot, Mainpost, Search, Modal, Profilephoto},
    mounted: function(){
      //  console.log($(window).width())
      $('#myCarousel').carousel({
        interval: 3000,
        cycle: true
      }); 
      this.showAn('.welcome-body > #app > .fruits-container > div.fruits-inner-container > div > img');
    },
    methods:{
        same: function(input){
            return input
        },
        showAn: function(ele){
         // document.querySelector(ele).style.opacity = '0'
          var observer = new IntersectionObserver(function(entries) {
            // isIntersecting is true when element and viewport are overlapping
            // isIntersecting is false when element and viewport don't overlap
            if(entries[0].isIntersecting === true)
            console.log('wwwwwwwwwww')
            document.querySelector(ele).style.backgroundColor = 'red'
           document.querySelector(ele).classList.add('d-opacity');
          }, { threshold: [0] });
          
          observer.observe(document.querySelector(ele));
        },
    },
    
});
