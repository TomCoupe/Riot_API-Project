require('./bootstrap');
window.Vue = require('vue');

Vue.component('champion-search', require('./components/ChampionSearch.vue').default);

const app = new Vue({
    el: '.main',
});