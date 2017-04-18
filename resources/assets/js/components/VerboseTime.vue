<template>
    <span>{{ time }}</span>
</template>
<script>
    module.exports = {
        props: {
            timestamp: {required: true}
        },
        data() {
            return {
                now: moment.utc().local()
            }
        },
        computed: {
            time() {
                return moment(this.timestamp).utc().local().from(this.now);
            }
        },
        methods: {

        },
        mounted() {
            this.tick = setInterval(_ => {
                this.now = moment.utc().local();
                console.log('change time');
            }, 60000);
        },
        destroyed() {
            clearInterval(this.tick);
        }
    }
</script>
<style lang="scss">

</style>