<?php

namespace App\Http\Controllers;
use Devtemple\Laralol\Facades\Champion;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class HomeController extends BaseController {

    public function getSummonerDetails($name) {
        $response = Http::get('http://ddragon.leagueoflegends.com/cdn/10.11.1/data/en_US/champion/Aatrox.json');
        dd(json_encode($response));
    }
    // https://api.riotgames.com
}           