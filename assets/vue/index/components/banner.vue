<template>
    <div class="page-section hero">
        <div class="bg-image">
            <picture>
                <img
                    style="max-width: unset"
                    sizes="(max-width: 3840px) 100vw, 3840px"
                    :srcset="`
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_200.jpg')} 200w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_825.jpg')} 825w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_1222.jpg')} 1222w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_1546.jpg')} 1546w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_1830.jpg')} 1830w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_2154.jpg')} 2154w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_2385.jpg')} 2385w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_2618.jpg')} 2618w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_2814.jpg')} 2814w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_2993.jpg')} 2993w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3194.jpg')} 3194w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3360.jpg')} 3360w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3527.jpg')} 3527w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3616.jpg')} 3616w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3655.jpg')} 3655w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3782.jpg')} 3782w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3822.jpg')} 3822w,
${require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3840.jpg')} 3840w`"
                    :src="require('/assets/media/pages/index/banner/tallmancode-home-banner_diwlbo_c_scale,w_3840.jpg')"
                    alt="">
            </picture>
        </div>
    </div>
</template>

<script>
export default {
    name: "Banner",
    created() {
        window.addEventListener('resize', this.imageAdjust)
    },
    mounted() {
        this.imageAdjust()
    },
    methods: {
        imageAdjust() {
            const imageWrapper = document.querySelector('.bg-image')
            const image = document.querySelector('.bg-image img')
            let wrapperHeight = imageWrapper.offsetHeight
            let wrapperWidth = imageWrapper.offsetWidth
            let aspectRatio = (16/9);
            if ((wrapperWidth / wrapperHeight) > aspectRatio) {
                image.style.width = '100%';
                image.style.height = 'auto';
            } else if ((wrapperWidth / wrapperHeight) < aspectRatio) {
                image.style.width = 'auto';
                image.style.height = '100%';
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.hero {
    --found-gutter-x: 1.5rem;
    --found-gutter-y: 0;
    position: relative;
    height: 100vh;
    margin-top: calc(var(--found-gutter-y) * -1);
    margin-right: calc(var(--found-gutter-x) * -0.5);
    margin-left: calc(var(--found-gutter-x) * -0.5);

    .bg-image {
        height: 100%;
        width: 100%;
        position: relative;

        overflow: hidden;

        img {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: block;
        }
    }

}
</style>