<template>
    <div class="menu__item-inner">
        <div class="sidemenu">
            <a class="sidemenu__item" href="#"><span class="sidemenu__item-inner">The Gameplay</span></a>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideMenu"
}
</script>

<style lang="scss" scoped>
@import 'assets/scss/vue-helper';
.sidemenu{
    @include media-breakpoint-up('lg'){
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    &__item {
        position: relative;
        overflow: hidden;
        margin: 0.25rem 0;
        display: block;
        color: #fff;
        text-decoration: none;
        transition: color 0.1s ease-in-out;
        &:hover{
            color: #f20c40;
        }
        &-inner {
            display: block;
            transform: translate3d(0,100%,0);
        }
        @include media-breakpoint-up('lg'){
            text-transform: uppercase;
            letter-spacing: 0.15rem;
            font-size: 0.85rem;
        }
    }
}
</style>