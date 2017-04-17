<template>
    <div class="box chat-box">
        <h2>Chat</h2>
        <ul class="messages">
            <li v-for="message in state.messages" class="message">
                {{ message.body }}
            </li>
        </ul>
        <input @keyup.enter="sendMessage" type="text" v-model="newMessage">
        <button @click="sendMessage">Envoyer</button>
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
        mounted() {
            this.messagesList = document.querySelector('ul.messages');
        },
        updated() {
            this.messagesList.scrollTop = this.messagesList.scrollHeight;
        },
        methods: {
            sendMessage() {
                store.addMessage({author: 'Omar Jbara', timestamp: new Date(), body: this.newMessage});
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
        max-height: 200px;
        overflow-y: auto;
        & li {
            padding: 10px;
            &:nth-of-type(even) {
                background: transparentize(black, 0.97);
            }
        }
    }
</style>