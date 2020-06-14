<template>
    <div class="form-group">
        <label><b>Champion name:</b></label>
        <input type="text" list="champion" placeholder="Please input a champion name" class="form-control" v-model="formData.champName">
        <datalist id="champion">
            <option v-for="champion in allChampions" :value="champion.name">
            </option>
        </datalist>
        &nbsp;
        <button class="btn btn-primary-dark text-white button-full-width"> Search</button>
        &nbsp;
        <button class="btn btn-danger button-full-width"> Random Champion</button>
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
        postChampion() {
            
        }
    }
}
</script>

<style>

</style>