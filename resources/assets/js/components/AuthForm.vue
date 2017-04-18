<template>

    <div class="auth-forms">
        <ul class="auth-tabs">
            <li @click.prevent="setTab('login')" :class="{active: isLogin}">Se connecter</li>
            <li @click.prevent="setTab('register')" :class="{active: isRegister}">S'inscrire</li>
        </ul>
        <transition name="fade" mode="out-in">
            <div v-if="isLogin" class="login tab-content" key="login">
                <slot name="login"></slot>
            </div>
            <div v-else="" class="register tab-content" key="register">
                <slot name="register"></slot>
            </div>
        </transition>

    </div>

</template>
<script>
    module.exports = {
        data() {
            return {
                selected: "login"
            }
        },
        created() {
            if(window.location.href.includes('register')) this.selected = "register";
        },
        methods: {
            setTab(tab) {
                this.selected = tab;
            }
        },
        computed: {
            isLogin() {
                return this.selected === "login";
            },
            isRegister() {
                return this.selected === "register";
            }
        }
    }
</script>
<style lang="scss">
    @import "../../sass/components/variables";
    @import "../../sass/functions";


    .auth-forms {
        background: whitesmoke;
        box-shadow: $box-shadow;
        border-radius: 4px;
        color: black;
        width: 35vw;
        min-width: 500px;
        & ul.auth-tabs {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            & li {
                border-radius: 4px;
                transition: all 0.3s;
                flex: 1;
                text-align: center;
                background: darken(whitesmoke, 5%);
                display: inline-block;
                padding: 20px;
                &:nth-of-type(1) {
                    border-bottom-right-radius: 0;
                    border-top-right-radius: 0;
                }
                &:nth-of-type(2) {
                    border-bottom-left-radius: 0;
                    border-top-left-radius: 0;
                }
                &:hover {
                    cursor: pointer;
                    background: darken(whitesmoke, 3%);
                }
                &.active {
                    background: whitesmoke;
                }
            }
        }
        & .tab-content {
            padding: 20px;
        }
    }
</style>