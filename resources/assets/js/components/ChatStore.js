class ChatStore {
    constructor() {
        this.state = {
            messages: []
        }
    }

    addMessage(message) {
        this.state.messages.push(message);
    }
}

export default new ChatStore();