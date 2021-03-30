require('./bootstrap');

window.Vue = require('vue').default

Vue.component('tour',require('./components/TourPage.vue').default);


const app  = new Vue({
   
}).$mount('#app');