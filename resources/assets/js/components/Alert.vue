<template>
    <transition name="fade">
        <div v-if="opened" :class="'alert ' + type" key="alert">
            <i @click.prevent="close" class="fa fa-times"></i>
            <slot></slot>
        </div>
    </transition>
</template>
<script>
    module.exports = {
        props: {
            type: {default: 'success', type: String, required: true}
        },
        data() {
            return {
                opened: true
            }
        },
        methods: {
            close() {
                this.opened = false;
            }
        }
    }
</script>
<style lang="scss">

</style>