<template>
    <div class="tag-blocks">
        <div class="container">
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
            <tag-block :image-src="require('/assets/media/tag-blocks/php-block-image.jpg')"></tag-block>
        </div>
    </div>
</template>

<script>
import TagBlock from "./tag-block";

export default {
    name: "tag-blocks",
    components: {TagBlock}
}
</script>

<style lang="scss" scoped>
.tag-blocks {
    position: absolute;
    width: 100%;
    bottom: -40px;
    .container {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
    }
}
</style>