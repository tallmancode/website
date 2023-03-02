<template>
    <div class="hero-outer">
        <div class="inner" :style="{'background-image': `url(${require('/assets/media/page-banners/blog-header.png')})`}">
            <posts-slide></posts-slide>
            <tag-blocks></tag-blocks>
        </div>
    </div>
</template>

<script>
import PostsSlide from "./posts-slide";
import TagBlocks from "./tag-blocks/tag-blocks";
export default {
    name: "hero",
    components: { TagBlocks, PostsSlide },
    data(){
        return{

        }
    }
}
</script>

<style scoped lang="scss">
@import 'assets/scss/vue-helper';
.hero-outer{
    padding-bottom: 50px;
    display: flex;
    flex-flow: column;
    .inner{
        padding-bottom: 75px;
        height: 75vh;
        background-color: $white;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: inherit;
        background-position: top center;
        position: relative;
        display: flex;
        flex-flow: column nowrap;
        justify-content: flex-end;
    }
}

</style>