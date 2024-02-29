<template>
    <div>
        <h1>Conversations</h1>
        <span v-if="loading">Loading something special...</span>
        <ul v-else>
            <li v-for="conversation in conversations">
                Customer:
                {{ conversation.customer_name }}
                <button type="button" @click="deleteConversation(conversation)">DELETE</button>
                <ul>
                    <li v-for="message in conversation.messages">
                        {{ message.content }} (sent at {{ humanReadableFomat(message.sentAt) }})
                    </li>
                </ul>
            </li>
        </ul>
        <span v-if="!loading && conversations.length <= 0 ">Oh blimey! no conversations exist...</span>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    name: "Messenger",
    data() {
        return {
            loading: true,
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
            })
            .finally(() => {
                this.loading = false;
            });
        },
        deleteConversation(conversation) {
            axios.delete('/api/conversations/' + conversation.id)
                .finally(() => {
                    this.loading = !this.loading;
                    this.fetchConversations();
                });
        },
        humanReadableFomat(sentAt) {
            // Formatting date string with Moment Library
            return moment(sentAt).format("MMM D, YYYY h:mm A");
            /*
                Alternative approach
                Formatting date string with JS default Date Object
            */
            // return new Date(sentAt).toLocaleString('en-GB');
        }
    }
}
</script>

<style scoped>

</style>
