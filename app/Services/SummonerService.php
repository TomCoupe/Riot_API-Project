<?php
namespace App\Services;

use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\LeagueAPI\Definitions\Region;
use Illuminate\Support\Facades\Http;

class SummonerService {
    protected $api;

    public function __construct() {
        $this->api = new LeagueAPI([
            //  Your API key, you can get one at https://developer.riotgames.com/
            LeagueAPI::SET_KEY    => env('RIOT_API_KEY'),
            //  Target region (you can change it during lifetime of the library instance)
            LeagueAPI::SET_REGION => Region::EUROPE_WEST,
        ]);
        
    }

    public function getSummonerDataByName($name) {
        $summoner = $this->api->getSummonerByName($name);
        $response = Http::get('https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/'. $summoner->id . '?api_key=' . env('RIOT_API_KEY'));
        return $response->json();
    }
}