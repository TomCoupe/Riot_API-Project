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
                        Past 20 games played
                    </th>
                </tr>
                <tbody>
                <template v-for="game in this.matchHistory">
                <tr> 
                    
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
export default {
    name: "SummonerPage.vue",
    props: ['playerdata', 'playerinfo', 'playerregion', 'matchhistory', 'champions'],
    mounted() {
        this.checkIfRanked();
        this.iconURL = 'http://ddragon.leagueoflegends.com/cdn/10.12.1/img/profileicon/'+ this.playerinfo.profileIconId +'.png'
        if(this.showSoloDuo === true) {
        this.winRatio = this.calculateWinRatio();
        this.soloDuoRankPath = this.getSoloDuoRankName();
        }
        if(this.showFlex === true) {
        this.flexRatio = this.calculateFlexWinRatio();
        this.flexRankPath = this.getFlexRankName();
        }
    },
    data () {
        return {
            championArr: this.champions,
            playerData: this.playerdata,
            playerInfo: this.playerinfo,
            playerRegion: this.playerregion,
            matchHistory: this.matchhistory,
            iconURL: '',
            winRatio: '',
            flexRatio: '',
            soloDuoRankPath: '',
            soloDuoRank: '',
            flexRank: '',
            flexRankPath: '',
            showSoloDuo: false,
            showFlex: false
        }
    },
    methods: {
        calculateWinRatio() {
            let total = this.playerData[0].wins + this.playerData[0].losses;
            let temp = this.playerData[0].wins * 100;
            let result = temp / total; 
            return result.toFixed(1) + '%';
        },
        calculateFlexWinRatio() {
            let total = this.playerData[1].wins + this.playerData[1].losses;
            let temp = this.playerData[1].wins * 100;
            let result = temp / total; 
            return result.toFixed(1) + '%';
        },
        getSoloDuoRankName() {
            let rank = this.playerData[0].tier
            let lowerCase = rank.toLowerCase();
            let rankd = lowerCase.charAt(0).toUpperCase() + lowerCase.slice(1);
            this.soloDuoRank = rankd;
            let image = '/images/Emblem_' + rankd + '.png'; 
            return image;
        },
        getFlexRankName() {
            let rank = this.playerData[1].tier
            let lowerCase = rank.toLowerCase();
            let rankd = lowerCase.charAt(0).toUpperCase() + lowerCase.slice(1);
            this.flexRank = rankd;
            let image = '/images/Emblem_' + rankd + '.png'; 
            return image;
        },
        checkIfRanked() {
            this.showSoloDuo = (0 in this.playerData);
            this.showFlex = (1 in this.playerData);
        },
    }
}
</script>