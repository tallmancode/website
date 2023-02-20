<template>
    <div class="menu__item-inner">
        <p class="label label--topleft label--line">Let me show you</p>
        <a class="menu__item-link" href="">Test</a>
    </div>
</template>

<script>
export default {
    name: "ShowcaseMenu",
    data(){
        return{
            featuredDocs: false
        }
    }
}
</script>

<style scoped lang="scss">
@import 'assets/scss/vue-helper';
$menu-item-alt: #494d54;
.menu__item{
    &-link{
        color: #fff;
        text-decoration: none;
        transition: color 0.2s ease-in-out;
        text-align: left;
        align-self: flex-start;
        justify-self: start;
        font-size: 1.5rem;
        width: 100%;
        line-height: 1;
        padding: 1rem 2rem;
        margin: 1rem 0 auto;
        display: flex;
        flex-direction: column;

        &:first-of-type {
            margin: 3rem 0 0.5rem 0;
        }

        //height: calc(100% - 3rem);
        &::after {
            content: '\27F6';
            display: block;
            margin-top: auto;
            font-size: 0.95rem;
        }
        &:hover {
            color: #f20c40;
        }
    }
}
.label{
    display: none;
    @include media-breakpoint-up('lg'){
        display: block;
        color: $menu-item-alt;
        position: absolute;
        z-index: 1000;
        font-size: 0.85rem;
        font-weight: bold;
        margin: 0;
        white-space: nowrap;
        &--topleft{
            top: 2rem;
            left: 2rem;
        }
        &::before{
            content: '------------- ';
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            letter-spacing: -1px;
            margin: 0 0.75rem 0 0;
        }
    }
}
</style>