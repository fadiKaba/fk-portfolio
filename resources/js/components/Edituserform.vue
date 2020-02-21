<template>
<div>
    <Errs :errors="errors" :success="success"></Errs>
    <div class="modal-body">                                    
        <form>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control"  v-model="uName">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" v-model="uEmail">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select class="form-control" v-model="uRole">
                    <!-- <option disable :value="findRole(userRole)">{{userRole}}</option> -->
                    <option value="0">Subscriber</option>
                    <option value="1">Admin</option>
                </select>{{uRole}}
            </div>
        </form>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button @click="saveEdit()" type="button" class="btn btn-primary">Save changes</button>
    </div>
</div>       
</template>
<script>

const axios = require('axios');

import Errs from './Errs';

export default {
    name:'Edituserform',
    components:{Errs},
    props:['userId', 'userName', 'userEmail', 'userRole'],
    data: function(){
        return{
            uName:this.userName,
            uEmail:this.userEmail,
            uRole:this.findRole(this.userRole),
            errors:'',
            success:'',
        }
    },
    methods:{
        findRole: function(ro){
            if(ro == 'Admin'){
                return 1
            }else{
                return 0
            }
        },
        saveEdit: function(){
            let vm = this;
            axios.put('adminusers/'+this.userId, {
                //name: this.uName ,                             
                }).then(function (response){
                    vm.success = vm.uName + 'contact is saved';
                }).catch(function (error){
                    let err = error.response.data.errors;
                    vm.errors = err;               
                })
        }
    }
    
}
</script>
<style scoped>

</style>