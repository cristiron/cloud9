<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="me" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data: function() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage: function() {
                this.$emit('messagesent', {
                    user:  this.user,
                    message: this.newMessage,
                    test: 'caca'
                });

                
                  this.newMessage = '';
                 
            }
        }    
    }
</script>