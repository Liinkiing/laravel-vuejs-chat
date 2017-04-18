<template>
    <div class="box chat-box">
        <h2>Chat</h2>
        <ul class="messages">
            <li v-for="message in state.messages" class="message">
                {{ message.body }}
                <div><small>{{ message.author.name }} </small></div>
            </li>
        </ul>
        <div class="send-input">
            <input @keyup.enter="sendMessage" type="text" v-model="newMessage">
            <button :disabled="disabled" class="button send" @click="sendMessage">Envoyer</button>
        </div>
    </div>
</template>
<script>

    const store = require('./ChatStore').default;

    module.exports = {
        data() {
            return {
                newMessage: "",
                state: store.state
            }
        },
        computed: {
            disabled() {
                return this.newMessage.trim().length === 0;
            }
        },
        mounted() {
            this.messagesList = document.querySelector('ul.messages');
        },
        updated() {
            this.messagesList.scrollTop = this.messagesList.scrollHeight;
        },
        methods: {
            sendMessage() {
                if(this.disabled) return;
                store.addMessage(this.newMessage);
                this.newMessage = "";
            }
        },
    }
</script>
<style lang="scss">
    .chat-box {
        min-width: 50vw;
    }
    ul.messages {
        padding: 0;
        list-style: none;
        max-height: 400px;
        overflow-y: auto;
        & li {
            padding: 10px;
            &:nth-of-type(even) {
                background: transparentize(black, 0.97);
            }
        }
    }
    .send-input {
        display: flex;
        flex-direction: row;
    }
</style>