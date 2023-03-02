<template>
    <div :class="['pager-item', {active: active}]">
        <a class="pager-link" @click="$emit('clicked', number)">{{ number }}</a>
    </div>
</template>

<script>
export default {
    name: "pager-item",
    props: {
        number: {
            type: [String, Number],
            require: true
        },
        active: {
            type: Boolean,
            default: false
        }
    }
}
</script>

<style scoped lang="scss">
.pager-item{
    .pager-link{
        text-decoration: none;
        font-weight: 700;
        background: transparent;
        color: #6f6f6f;
        display: inline-block;
        font-size: 20px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        overflow: hidden;
        transition: 0.5s ease-in-out;
        cursor: pointer;
    }
    &.active{
        .pager-link{
            color: #17161a;
            padding-right: 80px;
            position: relative;
            &:after{
                content: "";
                width: 50px;
                display: block;
                height: 2px;
                background: #17161a;
                position: absolute;
                top: 13px;
                left: 30px;
            }
        }
    }
}
</style>