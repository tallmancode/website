<template>
    <div class="posts-slide">
        <posts-slide-item></posts-slide-item>
        <posts-slide-item></posts-slide-item>
        <posts-slide-item></posts-slide-item>
        <posts-slide-item></posts-slide-item>
    </div>
</template>

<script>
import PostsSlideItem from "./posts-slide-item";
export default {
    name: "posts-slide",
    components:{ PostsSlideItem }
}
</script>

<style scoped lang="scss">
@import "assets/scss/vue-helper";
.posts-slide{
    height: 300px;
    width: 125%;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-flow: row nowrap;
    //overflow: hidden;
}
</style>