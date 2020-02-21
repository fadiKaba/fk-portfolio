<template>
    <div>
        <div v-if="errors != ''">
        <p class="alert alert-danger text-center" v-for="(val, key) in errors" v-bind:key="key">{{val[0]}}</p>
        </div>
        <div v-if="success != ''">
        <p class="alert alert-success">{{success}}</p>
        </div>
    </div>
</template>
<script>
export default {
    name:'Errs',
    props:['errors', 'success'],
}
</script>
<style scoped>

</style>