<template>
    <div class="form-group">
        <input type="text" placeholder="Please input a champion name" class="form-control" v-model="formData.champName">
        <button class="btn btn-primary-dark text-white button-full-width"> Search</button>
        &nbsp;
        <button class="btn btn-danger button-full-width"> Random Champion</button>
    </div>
</template>

<script>
export default {
    name: "ChampionSearch",
    data() {
        return {
            formData: {
                champName: '',
            }
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