<template>
    <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title home-card-title"><i class="fas fa-chess-king"></i> {{this.name}} <i class="fas fa-chess-king"></i></h4>
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
                    <h4 class="card-title home-card-title">Ssdfsdfsd</h4>
                </div>
                <div class="card-body">
                    sdfdf
                </div>  
            </div>
        </div>  
        <div class="col">
            <div class="card homepage-card  h-100">
                <div class="card-header">
                    <h4 class="card-title home-card-title">sdfsdfsd</h4>
                </div>
                <div class="card-body">
                    sfdf
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
            <h4 class="card-title home-card-title"> Mcxvxcvxcvxc <i class="fas fa-trophy"></i></i></h4>
        </div>
        <div class="card-body">
            fdssd
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
    name: 'ChampionPage',
    props: ['name'],
    data () {
        return {
            champName: this.name,
            allChampions: champions,
            champData: []
        }
    },
    mounted () {
        this.findChampionByName();
    },
    methods: {
        findChampionByName() {
            for (let champ in this.allChampions) {
                if(this.allChampions[champ].name == this.champName) {
                    this.champData = this.allChampions[champ];
                    return;
                }
            }
        },
    }
}
</script>