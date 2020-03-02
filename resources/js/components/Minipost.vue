<template>
    <div class="card">
        <img v-if="src != ''" :src="'./images/'+ src" class="card-img-top" alt="Post-Img">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{body}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</template>
<script>
export default {
    name:'Minipost',
    props:{
        src: String,
        title: [String, Number],
        body: [String, Number]
    },
}
</script>
<style scoped>

</style>