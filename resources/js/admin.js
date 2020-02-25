require('./bootstrap');

window.Vue = require('vue');




import Foot from './components/Foot';
import Edituserform from './components/Edituserform';
import Search from './components/Search';

const ad = new Vue({
    el: '#adm',
    components:{Foot, Edituserform, Search},
    methods:{
        same: function(input){
            return input
        },
    },
});
