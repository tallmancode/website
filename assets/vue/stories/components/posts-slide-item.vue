<template>
    <div class="slide-item" :style="computedStyle">
        <div class="slide-item__inner">
            <img :src="require('/assets/media/pages/posts/slider-test-img.jpg')" alt="">
            <div class="content">
                <div class="slide-item-title">
                    Some Title
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "posts-slide-item",
    computed: {
        computedStyle() {
            return
        }
    }
}
</script>

<style scoped lang="scss">
@import "assets/scss/vue-helper";
.slide-item{
    width: 25%;
    padding: 1rem;
    height: 100%;
    &:first-of-type{
        height: 125%;
    }
    &:last-of-type{
        height: 125%;
        transform: translateY(-25%);
    }
    &:first-of-type,  &:last-of-type{
        .slide-item__inner img{
            height:100%;
            width: auto;
        }
    }
    &__inner{
        overflow: hidden;
        position: relative;
        width:100%;
        height: 100%;
        img{
            height:auto;
            width: 100%;
        }
    }
}
</style>