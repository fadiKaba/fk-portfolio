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
    methods:{
        same: function(input){
            return input
        },
    },
    mounted: function(){
      //  console.log($(window).width())
    }
});
