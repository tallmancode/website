<template>
    <nav class="menu">
        <div class="menu__item menu__item--1" data-direction="bt">
            <main-menu @close="toggle('close')"/>
        </div>
        <div class="menu__item menu__item--2" data-direction="lr">
            <feature-menu @close="toggle('close')"/>
        </div>
        <div class="menu__item menu__item--3" data-direction="bt">
            <side-menu @close="toggle('close')"/>
        </div>
        <div class="menu__item menu__item--4" data-direction="rl">
            <showcase-menu @close="toggle('close')" @links:update="initElements()"/>
        </div>
        <div class="menu__item menu__item--5" data-direction="tb">
            <div class="menu__item-inner">
                <p class="quote">In a world where we're taught to colour within the lines, I draw them.</p>
            </div>
        </div>
        <button class="action action-menu" @click="toggle('open')">
            <MenuOpen></MenuOpen>
        </button>
        <button class="action action-close" @click="toggle('close')">
            <MenuClose></MenuClose>
        </button>
    </nav>
</template>

<script>
import {gsap, Quint, Quart, Quad } from "gsap";
import MainMenu from "./components/MainMenu";
import SideMenu from "./components/SideMenu";
import FeatureMenu from "./components/FeatureMenu";
import ShowcaseMenu from "./components/ShowcaseMenu";
import MenuOpen from "../svg/MenuOpen";
import MenuClose from "../svg/MenuClose";
import SymfonyIconVertical from "../svg/SymfonyIconVertical";

export default {
    name: "HeaderNav",
    components: {MenuOpen, MenuClose, SymfonyIconVertical, MainMenu, SideMenu, FeatureMenu, ShowcaseMenu},
    data() {
        return {
            isAnimating: false,
            menu: null,
            items: [],
            itemsTotal: 0,
            DOM: {},
        }
    },
    mounted() {
        this.initElements();
    },
    methods: {
        initElements(){
            this.menu = document.querySelector('nav.menu')
            this.DOM.openCtrl = document.querySelector('.action-menu');
            this.DOM.closeCtrl = document.querySelector('.action-close');
            this.items = [].slice.call(this.menu.querySelectorAll('.menu__item'));
            this.DOM.menulink = document.querySelector('.menu__item-link');
            this.itemsTotal = this.items.length;
            this.DOM.mainLinks = document.querySelectorAll('.mainmenu > a.mainmenu__item');
            this.DOM.sidemenuLinks = document.querySelectorAll('.sidemenu span.sidemenu__item-inner');
            this.DOM.menulink = document.querySelector('.menu__item-link');
        },
        toggle(action) {
            if(action === 'open'){
                document.body.classList.add('nav-open')
            }else{
                document.body.classList.remove('nav-open')
            }
            if (this.isAnimating) return;
            // (dis)allow the main image tilt effect.
            //allowTilt = action === 'open' ? false : true;
            this.isAnimating = true;
            // Toggling the open state class.
            this.menu.classList[action === 'open' ? 'add' : 'remove']('menu--open');
            // After all is animated..
            const animationEnd = (pos) => {
                if (pos === this.itemsTotal - 1) {
                    this.isAnimating = false;
                }
            };
            // Going through each menu´s item.
            this.items.forEach((el, pos) => {
                const innerEl = el.querySelector('.menu__item-inner');
                const config = {};
                const configInner = {};
                const direction = el.dataset.direction;
                if (direction === 'bt') {
                    config.y = '101%';
                    configInner.y = '-101%';
                    configInner.x = '0%';
                } else if (direction === 'tb') {
                    config.y = '-101%';
                    configInner.y = '101%';
                    configInner.x = '0%';
                } else if (direction === 'lr') {
                    config.x = '-101%';
                    configInner.x = '101%';
                } else if (direction === 'rl') {
                    config.x = '101%';
                    configInner.x = '-101%';
                } else {
                    config.x = '101%';
                    config.y = '101%';
                    configInner.x = '-101%';
                    configInner.y = '-101%';
                }

                if (action === 'open') {
                    // Setting the initial values.
                    gsap.set(el, config);
                    gsap.set(innerEl, configInner);

                    // Animate.
                    gsap.to([el, innerEl], .9, {
                        ease: Quint.easeOut,
                        x: '0%',
                        y: '0%',
                        onComplete: () => animationEnd(pos)
                    });
                } else {
                    gsap.to(el, 0.6, {
                        ease: Quart.easeInOut,
                        x: config.x || 0,
                        y: config.y || 0
                    });
                    gsap.to(innerEl, 0.6, {
                        ease: Quart.easeInOut,
                        x: configInner.x || 0,
                        y: configInner.y || 0,
                        onComplete: () => animationEnd(pos)
                    });
                }
            });

            // Show/Hide open and close ctrls.
            gsap.to(this.DOM.closeCtrl,  {
                duration: 0.6,
                ease: action === 'open' ? Quint.easeOut : Quart.easeInOut,
                startAt: action === 'open' ? {rotation: 0} : null,
                opacity: action === 'open' ? 1 : 0,
                rotation: action === 'open' ? 180 : 270
            });

            gsap.to(this.DOM.openCtrl,  {
                duration: action === 'open' ? 0.6 : 0.3,
                delay: action === 'open' ? 0 : 0.3,
                ease: action === 'open' ? Quint.easeOut : Quad.easeOut,
                opacity: action === 'open' ? 0 : 1
            });

            // Main links animation.
            gsap.to(this.DOM.mainLinks,  {
                duration: action === 'open' ? 0.9 : 0.2,
                ease: action === 'open' ? Quint.easeOut : Quart.easeInOut,
                startAt: action === 'open' ? {y: '50%', opacity: 0} : null,
                y: action === 'open' ? '0%' : '50%',
                opacity: action === 'open' ? 1 : 0,
                stagger: 0.2
            });

            // Sidemenu links animation.
            gsap.to(this.DOM.sidemenuLinks,  {
                duration: action === 'open' ? 0.5 : 0.2,
                ease: action === 'open' ? Quint.easeInOut : Quart.easeInOut,
                startAt: action === 'open' ? {y: '100%'} : null,
                y: action === 'open' ? '0%' : '100%',
                stagger: 0.2
            });

            // The Feature menu link.
            gsap.to(this.DOM.menulink,  {
                duration: action === 'open' ? 0.9 : 0.6,
                ease: action === 'open' ? Quint.easeOut : Quart.easeInOut,
                startAt: action === 'open' ? {x: '10%'} : null,
                x: action === 'open' ? '0%' : '10%'
            });
        }
    }
}
</script>

<style lang="scss" scoped>
@import "assets/scss/vue-helper";

$menu-text-colour: #fff;
$menu-backgound-colour: #252525;
$menu-toggle-colour: #000;
$menu-link-colour: #fff;
$menu-link-hover-colour: #f20c40;
$menu-item1-backgound: #15171b;
$menu-item2-backgound: #2c35b7;
$menu-item3-backgound: #0f1013;
$menu-item4-backgound: #1d2027;
$menu-item5-backgound: #0f1013;
$menu-item-alt: #494d54;
$menu-quote-colour: #5b677a;
$menu-info-colour: #57535a;
$menu-title-colour: #e23434;
$menu-tagline-colour: #e2e2e2;
$menu-mobile-row-count: 5;

$panel-bg-1: #2d3032;
$panel-bg-2: #555759;
/* Icons */
.icon {
    display: block;
    width: 1.5em;
    height: 1.5em;
    margin: 0 auto;
    fill: $menu-toggle-colour;
}

main {
    position: relative;
    width: 100%;
}

.frame {
    position: relative;
    z-index: 199;
}

.content {
    text-align: center;
    position: relative;
    z-index: 100;
}

.background {
    perspective: 1000px;
}

.action {
    background: none;
    border: 0;
    color: #000;
    cursor: pointer;
    padding: 0;

    &-menu {
        pointer-events: auto;
        position: fixed;
        top: 1.5rem;
        right: 1.5rem;
        z-index: 1000;
        @include media-breakpoint-up('lg'){
            position: absolute;
        }
    }

    &-close {
        position: fixed;
        top: 1.5rem;
        right: 1.75rem;
        z-index: 1000;
        opacity: 0;
        padding: 0 0.5rem;
        @include media-breakpoint-up('lg'){
            position: absolute;
        }
    }
}

.menu {
    text-align: center;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 200;
    display: grid;
    display: -ms-grid;
    grid-template-columns: 100%;
    -ms-grid-columns: 100%;
    grid-template-rows: repeat(5, 33.33%);
    -ms-grid-rows: 1fr 1fr 1fr 1fr 1fr;
    pointer-events: none;

    &--open {
        pointer-events: auto;
        overflow-y: auto;
        -ms-overflow-y: auto;
        .action--menu {
            pointer-events: none;
        }
    }

    &__item {
        width: 100%;
        position: relative;
        overflow: hidden;

        &--1 {
            -ms-grid-row: 1;
            transform: translate(0px, 101%);

            :deep(.menu__item-inner) {
                transform: translate(0%, -101%);
                background: $panel-bg-1;
            }
        }

        &--2 {
            -ms-grid-row: 2;
            transform: translate(-101%, 0px);

            :deep(.menu__item-inner) {
                transform: translate(101%, 0px);
                background: $menu-item2-backgound;
            }
        }

        &--3 {
            transform: translate(0px, 101%);
            -ms-grid-row: 3;

            :deep(.menu__item-inner) {
                transform: translate(0%, -101%);
                background: $panel-bg-2;
            }
        }

        &--4 {
            -ms-grid-row: 4;
            transform: translate(101%, 0px);

            .menu__item-inner {
                transform: translate(-101%, 0px);
                background: $panel-bg-1;
            }
        }

        &--5 {
            -ms-grid-row: 5;
            transform: translate(0px, -101%);

            .menu__item-inner {
                transform: translate(0%, 101%);
                background: $menu-item5-backgound;
            }
        }

        :deep(.menu__item-inner) {
            overflow: hidden;
            transform: translate3d(101%, 0, 0);
            height: 100%;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }
}

.icon {
    &--menu {
        width: 2rem;
    }

    &--close {
        width: 1rem;
        fill: #fff;
    }
}

.quote {
    font-size: 2rem;
    padding: 1rem;
    text-align: center;
    max-width: 70%;
    color: $menu-quote-colour;
    font-family: "sabbath-black", serif;
}

@include media-breakpoint-up('lg') {
    body {
        padding: 0;
    }
    .content {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        min-height: 100vh;
        text-align: left;
    }
    .menu {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        display: -ms-grid;
        display: grid;
        grid-template-columns: 20% 30% 50%;
        -ms-grid-columns: 20% 30% 50%;
        grid-template-rows: 60% 40%;
        -ms-grid-rows: 60% 40%;
        grid-template-areas:
            "item3 item2 item1"
            "item4 item5 item1";

        &__item {
            height: 100%;

            &--1 {
                grid-area: item1;
                -ms-grid-column: 3;
                -ms-grid-column-span: 2;
                -ms-grid-row: 1;
                -ms-grid-row-span: 2;
            }

            &--2 {
                grid-area: item2;
                -ms-grid-column: 2;
                -ms-grid-column-span: 1;
                -ms-grid-row: 1;
                -ms-grid-row-span: 1;
            }

            &--3 {
                grid-area: item3;
                -ms-grid-column: 1;
                -ms-grid-column-span: 1;
                -ms-grid-row: 1;
            }

            &--4 {
                grid-area: item4;
                -ms-grid-column: 1;
                -ms-grid-column-span: 1;
                -ms-grid-row: 2;
            }

            &--5 {
                grid-area: item5;
                -ms-grid-column: 2;
                -ms-grid-column-span: 1;
                -ms-grid-row: 2;
            }

            :deep(.menu__item-inner) {
                align-items: center;

                &:hover {
                    .menu__item-hoverlink {
                        opacity: 1;
                    }
                }
            }
        }
    }
}


</style>