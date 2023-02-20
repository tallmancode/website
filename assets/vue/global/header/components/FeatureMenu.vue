<template>
    <div class="menu__item-inner">
        <div :style="{ backgroundImage: 'url('+require('/assets/media/nav-images/header-banner-1-mobile.jpg')+')'}"
             class="menu__item-map">
        </div>
<!--        <a class="menu__item-hoverlink" href="#">The location</a>-->
    </div>
</template>

<script>
export default {
    name: "FeatureMenu"
}
</script>

<style lang="scss" scoped>
@import 'assets/scss/vue-helper';
$menu-link-colour: #fff;
$menu-link-hover-colour: #f20c40;
.menu__item{
    &-map {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: no-repeat 50% 50%;
        background-size: cover;
        transition: transform 0.8s cubic-bezier(0.2, 1, 0.8, 1);
    }
    &-hoverlink {
        font-weight: bold;
        text-transform: capitalize;
        position: relative;
        z-index: 1000;
        display: block;
        text-decoration: none;
        color: #fff;
        &:hover {
            color: $menu-link-hover-colour;
            border-bottom-color:  $menu-link-hover-colour;
        }
        @include media-breakpoint-up('lg'){
            font-size: 1.25rem;
            text-transform: lowercase;
            border-bottom: 2px solid #fff;
            opacity: 0;
            transition: opacity 0.3s, color 0.3s, border-bottom-color 0.3s;
        }
    }
    &-inner{
        &:hover{
            .menu__item-map {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
    }
}
</style>