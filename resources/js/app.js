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
import Clientsearch from './components/Clientsearch';
import Contacts from './components/Contacts';


$(function () {
    $('[data-toggle="popover"]').popover()
  })

const app = new Vue({
    el: '#app',
    components:{Mainlink,Cyrcle,Foot, Mainpost, Search, Modal, Profilephoto, Clientsearch, Contacts},
    mounted: function(){
      //  console.log($(window).width())
      $('#myCarousel').carousel({
        interval: 3000,
        cycle: true
      }); 
      this.showAn('div.fruits-inner-container > div');
      this.showAn('.advice-container > div > div:nth-child(2)');
    },
    methods:{
        same: function(input){
            return input
        },
        showAn: function(ele){
          if(document.querySelectorAll(ele).length > 0){
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
          }         
        },
    },
    
});
