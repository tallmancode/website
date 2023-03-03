<template>
    <div class="slide-item" :style="computedStyle">
        <div class="slide-item__inner">
            <img :src="image" alt="">
            <div class="content">
                <div class="slide-item-title">
                    {{ title }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "posts-slide-item",
    props: {
        title: { type: String, require: true },
        image: { type: String, require: true },
        slug: { type: String, require: true },
    },
    computed: {
        computedStyle() {
            return
        }
    },

}
</script>

<style scoped lang="scss">
@import "assets/scss/vue-helper";
.slide-item{
    display: inline-block;
    padding: 1rem;
    height: calc(70vh - 200px);
    &__inner{
        width: calc((125vw/4) - 2rem);
        overflow: hidden;
        position: relative;
        height: 100%;
        img{
            height:100%;
            width: auto;
        }
        .content{
            position: absolute;
            bottom: 0;
        }
    }
}
</style>