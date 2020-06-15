<template>
    <div class="form-group">
        <label><b>Summoner name:</b></label>
        <input class="form-control" type="text" placeholder="Please input a summoner name" v-model="summonerName">
        <label><b>Region:</b></label>
        <v-select :options="arr" placeholder="Select a region" v-model="region"></v-select>
        &nbsp;
        <button class="btn btn-primary-dark text-white button-full-width" @click="this.getSummoner"> Search</button>
        &nbsp;
    </div>
</template>
<script>

import vSelect from 'vue-select'
import Vue from 'vue'
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect)

export default {
    name: "SummonerSearch.vue",
    data () {
        return {
            arr: [
                'EUW',
                'NA',
                'EUNE',
                'KR',
            ],
            region: '',
            summonerName: '' 
        }
    },

    methods: {
        getSummoner() {
            window.location.href = '/summoner/'+ this.region +'/'+ this.summonerName;
        }
    }
}
</script>