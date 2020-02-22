require('./bootstrap');

window.Vue = require('vue');




import Foot from './components/Foot';
import Edituserform from './components/Edituserform';


const ad = new Vue({
    el: '#adm',
    components:{Foot, Edituserform},
    methods:{
        same: function(input){
            return input
        },
    },
});
