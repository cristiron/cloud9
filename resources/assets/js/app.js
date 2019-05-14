
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app =  new Vue({
    el: '#app',

    data: {
        messages: [],
        
    },

    created: function(){
        this.getMsg();
        Echo.private('chat').listen('MessageSent', (e) =>
        {this.messages.push({message: e.message.message, user: e.user});
  });
    },

    methods: {
        getMsg: function() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
  });
        },
        

        addMsg: function(test) {
            this.messages.push(test);
            axios.post('/messages', 
    test).then(response => {
              console.log('addMsg a primit emit-ul de la chatform cu payloadul user si message, probabil in format json care este integrat in parametrul message al functiei. Apoi jsonul message este adugat la sfarsitul data messages array. Axion il ia si el si il transmite post la route /messages');
            });

        }
        
         
        
        
    }
});