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

    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s, transform 0.4s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
        opacity: 0;
        transform-origin: left;
        transform: scale(0.95);
    }

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
                    background: darken(whitesmoke, 5%);
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