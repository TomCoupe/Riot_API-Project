<template>
    <div class="form-group">
        <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Summoner Name</th>
                <th scope="col">LP</th>
                <th scope="col">Region</th>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>1337</td>
                <td>EUW</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>WagWannnn</td>
                <td>1000</td>
                <td>EUW</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>992</td>
                <td>NA</td>
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
        this.getLeaderboards(this.region);
    },
    methods: {
        getLeaderboards(region) {
            axios.get('/leaderboards/' + region)
            .then(response => {
                players = response.data;
            })
            .catch(error => {
                console.log(error);
            }); 
        }
    }
}
</script>