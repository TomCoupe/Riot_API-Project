<template>
<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title home-card-title"><i class="fas fa-chess-king"></i> {{this.playerInfo.name}} - Season 10 <i class="fas fa-chess-king"></i></h4>
                </div>
            </div>
        </div>
    </div>
    &nbsp;
    <div class="row">
        &nbsp;
        <div class="col">
            <div class="card homepage-card h-100">
                <div class="card-header">
                    <h4 class="card-title home-card-title">Summoner info</h4>
                </div>
                <div class="card-body">
                    <div>
                    <img class="text-float" :src="this.iconURL" width="100">
                    <p>
                        &emsp;<b>Summoner: {{this.playerInfo.name}}</b> <br>
                        &emsp;<b>Region: {{this.playerRegion}}</b> <br>
                        &emsp;<b>Account Level: {{this.playerInfo.summonerLevel}}</b> <br>
                        &emsp;<b>Ranked Win/Loss Ratio: <span class="text-green">{{playerData[0].wins}}</span>/<span class="text-red">{{playerData[0].losses}}</span> ({{this.winRatio}})</b>
                    </p>
                    </div>
                    &nbsp;
                    <div>
                        <h5 class="card-title">Ranked Solo/Duo</h5>
                        <template v-if="this.showSoloDuo === true">
                        <img class="text-float" :src="this.soloDuoRankPath" width="75">
                        <p class="home-card-title">
                            <b>{{this.soloDuoRank}} {{this.playerData[0].rank}} - {{this.playerData[0].leaguePoints}} LP</b> <br>
                            <b><span class="text-green">{{playerData[0].wins}}</span>/<span class="text-red">{{playerData[0].losses}}</span> ({{this.winRatio}})</b>
                        </p>
                        </template>
                    </div>
                    <br>
                    <div>
                        <h5 class="card-title">Ranked Flex</h5>
                        <template v-if="this.showFlex === true"> 
                        <img class="text-float" :src="this.flexRankPath" width="75">
                        <p class="home-card-title">
                            <b>{{this.flexRank}} {{this.playerData[1].rank}} - {{this.playerData[1].leaguePoints}} LP</b> <br>
                            <b><span class="text-green">{{playerData[1].wins}}</span>/<span class="text-red">{{playerData[1].losses}}</span> ({{this.flexRatio}})</b>
                        </p>
                        </template>
                    </div>
                </div>  
            </div>
        </div>  
        <div class="col">
            <div class="card homepage-card  h-100">
                <div class="card-header">
                    <h4 class="card-title home-card-title">Match History</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Matches</th>
                        </tr>
                        <tr>
                            match 1
                        </tr>
                        <tr>
                            match 2
                        </tr>
                        <tr>
                            match 3
                        </tr>
                        <tr>
                            match 4
                        </tr>
                        <tr>
                            match 5
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        &nbsp;
    </div>
    &nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col w-100">
    <div class="card homepage-card">
        <div class="card-header">
            <h4 class="card-title home-card-title"> Match History <i class="fas fa-trophy"></i></i></h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>
                        {{this.summonerName}}'s past 20 games played.
                    </th>
                </tr>
                <tbody>
                <template v-for="game in this.matchHistory">
                <tr class="table-bordered"> 
                    <img class="text-float circular--square" :src="getChampIcon(game.championKey)">
                    &emsp;<b>Score: <span class="text-green">{{game.kills}}</span>/<span class="text-red">{{game.deaths}}</span>/<span class="text-orange">{{game.assists}}</span></b>

                    <br>
                    &emsp;<b>Gold earned: <i class="fas fa-coins"></i> {{game.gold}}</b>
                    <div class="allign-right">
                        <button class="btn btn-primary-dark text-white">More Details <i class="fas fa-sort-down"></i></button>
                    </div>
                </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    &nbsp;
    &nbsp;
</div>
</div>
</template>

<script>
import champions from 'lol-champions';
export default {
    name: "SummonerPage.vue",
    props: ['playerdata', 'playerinfo', 'playerregion', 'matchhistory'],
    mounted() {
        this.checkIfRanked();
        this.iconURL = 'http://ddragon.leagueoflegends.com/cdn/10.12.1/img/profileicon/'+ this.playerinfo.profileIconId +'.png'
        if(this.showSoloDuo === true) {
        this.winRatio = this.calculateWinRatio(0);
        this.soloDuoRankPath = this.getRankName(0);
        }
        if(this.showFlex === true) {
        this.flexRatio = this.calculateWinRatio(1);
        this.flexRankPath = this.getRankName(1);
        }
    },
    data () {
        return {
            champArr: champions,
            playerData: this.playerdata,
            playerInfo: this.playerinfo,
            playerRegion: this.playerregion,
            matchHistory: this.matchhistory,
            summonerName: this.playerinfo.name,
            iconURL: '',
            winRatio: '',
            flexRatio: '',
            soloDuoRankPath: '',
            soloDuoRank: '',
            flexRank: '',
            flexRankPath: '',
            showSoloDuo: false,
            showFlex: false,

            summoner: {
                gameResult: '',
                gold: '',
                kills: '',
                assists: '',
                deaths: '',
                cs: ''
            },
        }
    },
    methods: {
        calculateWinRatio($key) {
            let total = this.playerData[$key].wins + this.playerData[$key].losses;
            let temp = this.playerData[$key].wins * 100;
            let result = temp / total; 
            return result.toFixed(1) + '%';
        },
        getRankName($key) {
            let rank = this.playerData[$key].tier
            let lowerCase = rank.toLowerCase();
            let rankd = lowerCase.charAt(0).toUpperCase() + lowerCase.slice(1);
            if($key == 0) {
                this.soloDuoRank = rankd;
            }
            if($key == 1) {
                this.flexRank = rankd;
            }
            let image = '/images/Emblem_' + rankd + '.png'; 
            return image;
        },
        checkIfRanked() {
            this.showSoloDuo = (0 in this.playerData);
            this.showFlex = (1 in this.playerData);
        },
        getChampIcon($key) {
            let name = '';
            this.champArr.forEach(function(champ) {
                if(champ.key == $key) {
                    name = champ.icon;
                }
            })
            return name;
        },
    }
}
</script>