<template>
    <div>
        <h1>Conversations</h1>
        <ul>
            <li v-for="conversation in conversations">
                Customer:
                {{ conversation.customer_name }}
                <button type="button" @click="deleteConversation(conversation)">DELETE</button>
                <ul>
                    <li v-for="message in conversation.messages">
                        {{ message.content }} (sent at {{ message.sentAt }})
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Messenger",
    data() {
        return {
            conversations: []
        };
    },
    mounted() {
        this.fetchConversations();
    },
    methods: {
        fetchConversations() {
            axios.get('/api/conversations').then((response) => {
                this.conversations = response.data.data;
            });
        },
        deleteConversation(conversation) {
            axios.delete('/api/conversations/' + conversation.id)
                .finally(() => {
                    this.fetchConversations();
                });
        }
    }
}
</script>

<style scoped>

</style>
