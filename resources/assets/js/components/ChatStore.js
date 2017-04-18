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
        this.state.messages.push({body: message, author: {name: document.getElementById('logged-user').innerText}});
        axios.post('/messages', {body: message})
            .then(response => { this.state.messages.pop(); this.state.messages.push(response.data.message) } );
    }

    pushMessage(message) {
        this.state.messages.push(message);
    }
}

export default new ChatStore();