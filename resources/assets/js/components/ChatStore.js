class ChatStore {
    constructor() {
        this.state = {
            messages: []
        };
        this.fetchMessages();
    }

    fetchMessages() {
        axios.get('/messages').then(response => this.state.messages = response.data);
    }

    addMessage(message) {
        axios.post('/messages', {body: message})
            .then(response => { this.state.messages.push(response.data.message) } );
    }
}

export default new ChatStore();