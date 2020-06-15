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
                        <img class="text-float" :src="this.soloDuoRankPath" width="75">
                        <p class="home-card-title">
                            <b>{{this.soloDuoRank}} {{this.playerData[0].rank}} - {{this.playerData[0].leaguePoints}} LP</b> <br>
                            <b><span class="text-green">{{playerData[0].wins}}</span>/<span class="text-red">{{playerData[0].losses}}</span> ({{this.winRatio}})</b>
                        </p>
                    </div>
                    <br>
                    <div>
                        <h5 class="card-title">Ranked Flex</h5>
                        <img class="text-float" :src="this.flexRankPath" width="75">
                        <p class="home-card-title">
                            <b>{{this.flexRank}} {{this.playerData[1].rank}} - {{this.playerData[1].leaguePoints}} LP</b> <br>
                            <b><span class="text-green">{{playerData[1].wins}}</span>/<span class="text-red">{{playerData[1].losses}}</span> ({{this.flexRatio}})</b>
                        </p>
                    </div>
                </div>  
            </div>
        </div>  
        <div class="col">
            <div class="card homepage-card  h-100">
                <div class="card-body">
                    sdfdssd
                </div>
            </div>
        </div>
        &nbsp;
    </div>
</div>
</template>

<script>
export default {
    name: "SummonerPage.vue",
    props: ['playerdata', 'playerinfo', 'playerregion'],
    mounted() {
        this.iconURL = 'http://ddragon.leagueoflegends.com/cdn/10.12.1/img/profileicon/'+ this.playerinfo.profileIconId +'.png'
        this.winRatio = this.calculateWinRatio();
        this.flexRatio = this.calculateFlexWinRatio();
        this.soloDuoRankPath = this.getSoloDuoRankName();
        this.flexRankPath = this.getFlexRankName();
    },
    data () {
        return {
            playerData: this.playerdata,
            playerInfo: this.playerinfo,
            playerRegion: this.playerregion,
            iconURL: '',
            winRatio: '',
            flexRatio: '',
            soloDuoRankPath: '',
            soloDuoRank: '',
            flexRank: '',
            flexRankPath: ''
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
        }
    }
}
</script>