
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

//register the chat-message component here
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));



const app = new Vue({
    el: '#app',
    data: {
    	messages: []
    },
    methods: {
    	addMessage(message){
    		//add to existing messages client side immediate visibility
    		this.messages.push(message);

    		//persist to the dbase
    		axios.post('/messages', message).then(response => {
    			// console.log(message);
    			//do what ever after success saved to db
    		});
    	}
    },
    created() {
    	axios.get('/messages').then(response => {
    		this.messages = response.data;
    	});
        Echo.join('chatroom')
            .here()
            .joining()
            .leaving()
            .listen('MessagePosted', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                })
            });

    }
});
