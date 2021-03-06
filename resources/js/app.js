require('./bootstrap');
window.Vue = require('vue');

Vue.component('champion-search', require('./components/ChampionSearch.vue').default);
Vue.component('summoner-search', require('./components/SummonerSearch.vue').default);
Vue.component('leaderboards-table', require('./components/LeaderboardsTable.vue').default);
Vue.component('champion-page', require('./components/ChampionPage').default);
Vue.component('summoner-page', require('./components/SummonerPage').default);

const app = new Vue({
    el: '.main',
});