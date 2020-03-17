<template>
    <div class="modal fade" :id="modalId" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="/wallpapers/modal.jpg" width="100%" class="mb-4">
                {{modalText}}
                <div v-if="loged == false">
                   You have to <a href="/login">login</a> to be able to like or comment. No account? <a href="/register">Register</a>
                </div>
                <div v-else>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
            <div class="modal-footer border-0">
                
                
            </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'Modal',
    props:['modalId', 'modalText', 'loged'],
}
</script>
<style scoped>
.modal-content{
    background-color: #fff;
    font-size: 1.2rem;
    font-weight: bold;
}
</style>