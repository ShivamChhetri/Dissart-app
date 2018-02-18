
require('./bootstrap');

window.Vue = require('vue');




Vue.component('chat-box', require('./components/ChatBox.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('comment', require('./components/Comment.vue'));
Vue.component('notify', require('./components/Notification.vue'));
Vue.component('like', require('./components/Like.vue'));

const app = new Vue({
    el: '#app',
    data:{
        picture: true
    },
    methods:{
        upload(){
            this.picture= false;
        }
    }
});
