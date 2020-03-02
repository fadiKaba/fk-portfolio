<template>
    <div class="jumbotron pt-0">
        <div class="card">
            <img v-if="src != ''" :src="'./images/' + src" class="card-img-top" alt="">
        </div>
        <h1 class="display-4">{{title}}</h1>
        <hr class="my-4">
        <p>{{body}}</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</template>
<script>
export default {
    name:'Mainpost',
    props:{
        src: String,
        title: String,
        body: String,
    },
}
</script>
<style scoped>

</style>