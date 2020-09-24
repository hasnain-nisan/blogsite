require('./bootstrap');


// Declaring the vue component
window.Vue = require('vue');
 // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('follow-button', require('./components/FollowButton.vue').default);


// Declaring a new vue instance
 const app = new Vue({
   el: '#app',
 });
