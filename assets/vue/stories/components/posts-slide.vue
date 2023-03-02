<template>
    <div class="posts-slide">
        <div class="container">
            <div class="posts-slide__rail">
                <posts-slide-item v-for="item in postsArray"
                                  :image="item.image"
                                  :title="item.title"
                                  :slug="item.slug"/>
            </div>
            <div class="posts-slide__controls">
                <pager-item v-for="index in postsCount"
                            :active="index === focusedIndex"
                            :key="index"
                            :number="index"
                            @clicked="pagerClick"/>
            </div>
        </div>
    </div>
</template>

<script>
import PostsSlideItem from "./posts-slide-item";
import PagerItem from "./pager-item";
export default {
    name: "posts-slide",
    components:{ PostsSlideItem, PagerItem },
    data() {
        return{
            focusedIndex: 1,
            posts: [
                {slug: 'some-slug', title: 'First', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'A Wonderful Title', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
                {slug: 'some-slug', title: 'Last', image: require('/assets/media/pages/posts/slider-test-img.jpg') },
            ]
        }
    },
    methods: {
        pagerClick(index){
            this.focusedIndex = index
        }
    },
    computed: {
        postsArray(){
            let next = this.posts.slice(0, 3);
            let previous = [this.posts.pop()];
            return previous.concat(next)
        },
        postsCount(){
            return this.posts.length
        }
    }
}
</script>

<style scoped lang="scss">
@import "assets/scss/vue-helper";
.posts-slide{
    width: 100%;
    &__rail{
        display: flex;
        width: 125vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
    &__controls{
        display: flex;
        flex-flow: row nowrap;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 40px;
    }
}
</style>