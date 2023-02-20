<template>
    <div class="menu__item-inner">
        <div class="mainmenu">
            <a href="/" class="mainmenu__item" @click="$emit('close')">
                Homeward
            </a>
            <a href="" class="mainmenu__item" @click="$emit('close')">
                Projects
            </a>
            <a href="" class="mainmenu__item" @click="$emit('close')">
                Documentation
            </a>
            <a href="" class="mainmenu__item" @click="$emit('close')">
                Contact
            </a>
        </div>
        <p class="label label--topleft label--vert-mirror">the important stuff</p>
        <p class="label label--bottomright label--vert">
            made with
            <SymfonyIconVertical></SymfonyIconVertical>
        </p>
    </div>
</template>

<script>
import SymfonyIconVertical from "../../svg/SymfonyIconVertical";
export default {
    name: "MainMenu",
    components: { SymfonyIconVertical },
}
</script>

<style scoped lang="scss">
@import 'assets/scss/vue-helper';
$menu-item-alt: #494d54;
$menu-link-hover-colour: #f20c40;
.mainmenu{
    @include media-breakpoint-up('lg'){
        counter-reset: menuitem;
    }
    &__item{
        opacity: 0;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: color 0.1s;
        margin: 0.25rem 0;
        display: block;
        color: #fff;
        @include media-breakpoint-up('lg'){
            font-size: 5vw;
            text-transform: lowercase;
            overflow: visible;
            margin: 0.5rem 0;
            padding: 0 0.5rem;
            position: relative;
            transition: color 0.3s;
            &:hover{
                color: $menu-item-alt;
                &::after{
                    opacity: 1;
                    transform: scale3d(1,1,1);
                }
            }
            &::before{
                counter-increment: menuitem;
                content: counters(menuitem, "", decimal-leading-zero);
                position: absolute;
                font-size: 0.85rem;
                top: 25%;
                left: -1.25rem;
                color: $menu-item-alt;
            }
            &::after{
                content: '';
                width: 100%;
                top: 58%;
                height: 6px;
                background: $menu-link-hover-colour;
                position: absolute;
                left: 0;
                opacity: 0;
                transform: scale3d(0,1,1);
                transition: transform 0.3s, opacity 0.3s;
                transform-origin: 100% 50%;
            }
        }
    }

}
.label {
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
        &--bottomright{
            bottom: 2rem;
            right: 2rem;
        }
        &--vert-mirror{
            transform: rotate(180deg);
        }
        &--vert, &--vert-mirror{
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            &::before{
                margin: 0.75rem 0;
            }
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