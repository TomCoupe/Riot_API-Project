<?php

namespace App\Http\Controllers;

use Devtemple\Laralol\Facades\Champion;
use Illuminate\Routing\Controller as BaseController;
use App\Services\SummonerService;

class HomeController extends Controller
{

    protected $service;

    public function __construct(SummonerService $service)
    {
        $this->service = $service;
    }

    // public function getSummonerDetails($name) {
    //     $summonerData = $this->service->getSummonerDataByName($name);
    //     dd($summonerData);
    // }
    // https://api.riotgames.com
    // https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/

    public function getLeaderboards($region) {
        return $this->service->getLeaderboards($region);
    }
}
