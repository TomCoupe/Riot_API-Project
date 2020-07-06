<template>
    <div class="form-group">
        <label><b>Champion name:</b></label>
        <input type="text" list="champion" placeholder="Please input a champion name" class="form-control" v-model="formData.champName">
        <datalist id="champion">
            <option v-for="champion in allChampions" :value="champion.name">
            </option>
        </datalist>
        &nbsp;
        <button class="btn btn-primary-dark text-white button-full-width" @click="this.getChampion"> Search</button>
        &nbsp;
        <button class="btn btn-danger button-full-width" @click="this.getRandomChampion"> Random Champion</button>
    </div>
</template>

<script>

import champions from 'lol-champions';

export default {
    name: "ChampionSearch",
    data() {
        return {
            formData: { 
                champName: '',
            },
            allChampions: champions,
        }
    },
    methods: {
        
        getChampion() {
            window.location.href = '/champion/' + formData.champName;
        },

        getRandomChampion() {
            var length = this.allChampions.length;
            var randomNumber = Math.floor(Math.random() * length);
            var randomChamp = this.allChampions[randomNumber].name;
            window.location.href = '/champion/' + randomChamp;
        }
    }
}
</script>

<style>

</style>