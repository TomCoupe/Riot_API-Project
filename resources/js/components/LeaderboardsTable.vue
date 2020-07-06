<template>
    <div class="form-group">
        <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Summoner Name</th>
                <th scope="col">LP</th>
                <th scope="col">Region</th>
            </tr>
            <tr v-for="summoner in this.players">
                <td>1</td>
                <td>{{summoner.summonerName}}</td>
                <td>{{summoner.leaguePoints}}</td>
                <td>EUW</td>
            </tr>
        </table>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: "LeaderboardsTable.vue",
    data () {
        return {
            players: [],
            region: 'EUW'
        }
    },
    mounted () {
        this.getLeaderboards('EUW');
    },
    methods: {
        getLeaderboards(region) {
            let app = this;
            axios.get('/leaderboards/' + region)
            .then(response => {
                app.players = response.data;
            })
            .catch(error => {
                console.log(error);
            }); 
        }
    }
}
</script>