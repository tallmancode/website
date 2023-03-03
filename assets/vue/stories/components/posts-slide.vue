<template>
    <div class="posts-slide">
        <div class="container">
            <div class="posts-slide__wrapper">
                <div :style="{transform: slidePosition}" class="posts-slide__rail">
                    <posts-slide-item v-for="item in postsArray"
                                      :image="item.image"
                                      :slug="item.slug"
                                      :title="item.title"/>
                </div>
            </div>
            <div class="posts-slide__controls">
                <pager-item v-for="index in featuredPosts.length"
                            :key="index"
                            :active="index === focusedIndex"
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
    components: {PostsSlideItem, PagerItem},
    data() {
        return {
            railPosts: [],
            focusedIndex: 1,
            featuredPosts: [
                {slug: 'some-slug', title: 'First', image: require('/assets/media/pages/posts/slider-test-img.jpg')},
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 2',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 3',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 4',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 5',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 6',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                }, {
                    slug: 'some-slug',
                    title: 'A Wonderful Title',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {
                    slug: 'some-slug',
                    title: 'A Wonderful Title 7',
                    image: require('/assets/media/pages/posts/slider-test-img.jpg')
                },
                {slug: 'some-slug', title: 'Last', image: require('/assets/media/pages/posts/slider-test-img.jpg')},
            ]
        }
    },
    methods: {
        pagerClick(index) {
            this.focusedIndex = index
        },
        createRailPosts(){

        },
    },
    computed: {
        slidePosition() {
            return `translateX(-${((125/4) * (this.focusedIndex - 1))}vw)`
        },
        postsArray() {
            const posts = [];

            posts.push(this.featuredPosts[this.featuredPosts.length - 1])

            this.featuredPosts.forEach(item => {
                posts.push(item)
            })

            const tailElem = this.featuredPosts.slice(0, 2)
            tailElem.forEach(item => {
                posts.push(item)
            })

            return posts
        },
    }
}
</script>

<style lang="scss" scoped>
@import "assets/scss/vue-helper";

.posts-slide {
    width: 100%;

    &__wrapper {
        width: 125vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        overflow: hidden;
    }

    &__rail {
        display: flex;
        flex-flow: row nowrap;
        width: 100%;
        transition: transform 0.5s ease-in-out;
    }

    &__controls {
        display: flex;
        flex-flow: row nowrap;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 40px;
    }
}
</style>