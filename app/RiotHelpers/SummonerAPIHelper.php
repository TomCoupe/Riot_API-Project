<?php

namespace App\RiotHelpers;

use Illuminate\Support\Facades\Http;

class SummonerAPIHelper
{

    public function getSummonerByID($region, $id)
    {
        $response = Http::get('https://' . $region . '.api.riotgames.com/lol/league/v4/entries/by-summoner/' . $id . '?api_key=' . env('RIOT_API_KEY'));
        return $response->json();
    }

    public function getSummonerByName($region, $name)
    {
        $response = Http::get('https://' . $region . '.api.riotgames.com/lol/summoner/v4/summoners/by-name/' . $name . '?api_key=' . env('RIOT_API_KEY'));
        return $response->json();
    }

    public function getRankedInformationByName($region, $name)
    {
        $accInfo = $this->getSummonerByName($region, $name);
        $rankedInfo = $this->getSummonerByID($region, $accInfo['id']);
        return $rankedInfo;
    }

    public function getMatchHistoryOfSummoner($region, $name)
    {
        $player = $this->getSummonerByName($region, $name);
        $response = Http::get('https://' . $region . '.api.riotgames.com/lol/match/v4/matchlists/by-account/' . $player['accountId'] . '?api_key=' . env('RIOT_API_KEY'));
        return $response->json();
    }

    public function getMatchDetails($region, $matchId)
    {
        $response = Http::get('https://' . $region . '.api.riotgames.com/lol/match/v4/matches/' . $matchId . '?api_key=' . env('RIOT_API_KEY'));
        return $response->json();
    }

    public function getChamps()
    {
        $response = Http::get('http://ddragon.leagueoflegends.com/cdn/10.12.1/data/en_US/champion.json');
        return $response->json();
    }

    public function getChallengerLeaderboards($region) {
        $queue = 'RANKED_SOLO_5x5';
        $response = Http::get('https://' . $region . '.api.riotgames.com//lol/league/v4/challengerleagues/by-queue/'. $queue .'?api_key='. env('RIOT_API_KEY'));
        return $response->json();
    }
}
