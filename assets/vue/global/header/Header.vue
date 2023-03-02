<template>
    <header>
        <div class="header-brand">
            <tmc-logo></tmc-logo>
        </div>
        <header-nav></header-nav>
    </header>
</template>

<script>
import HeaderNav from "./HeaderNav";
import TmcLogo from "../svg/TmcLogo";
export default {
    name: "HeaderInner",
    components: {HeaderNav, TmcLogo}
}
</script>
<style scoped lang="scss">
@import 'assets/scss/vue-helper';
header{
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 99;
    height: $header-height;
    background-color: #fff;
    padding: 0 1.5rem;
    .header-brand{
        height: 100%;
        max-width: 200px;
    }
}
.overlay-header{
    header{
        background-color: transparent;
    }
    &:not(.with-logo){
        header{
            .header-brand{
                display: none;
            }
        }
    }
}
</style>