<template>
    
</template>

<script>
export default {
    name: "SummonerPage.vue",
    props: ['playerdata'],
    data () {
        return {
            playerInfo: this.playerdata,
        }
    }
}
</script>