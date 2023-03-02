<template>
    <div class="tag">
        <a href="#">
            <img :src="imageSrc" alt="">
        </a>
    </div>
</template>

<script>
export default {
    name: "tag-block",
    props: {
        imageSrc: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped lang="scss">
.tag{
    border-radius: 50%;
    overflow: hidden;
    max-height: 80px;
    max-width: 80px;
}
</style>