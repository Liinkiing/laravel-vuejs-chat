
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat', require('./components/Chat.vue'));
Vue.component('auth-form', require('./components/AuthForm.vue'));
Vue.component('alert', require('./components/Alert.vue'));

moment.locale(document.documentElement.lang);

Vue.filter('timeago', function(value) {
    return moment.utc(value).local().fromNow();
});


Vue.filter('utc', function(value) {
    return moment.utc(value);
});

const app = new Vue({
    el: '#app'
});
