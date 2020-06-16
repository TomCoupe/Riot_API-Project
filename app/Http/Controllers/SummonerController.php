<?php
namespace App\Http\Controllers;

use App\RiotHelpers\SummonerAPIHelper;
use App\Services\SummonerService;

class SummonerController extends Controller {

    protected $service;

    public function __construct(SummonerService $service) {
        $this->service = $service;
    }

    public function getSummonerData($region, $name) {
        $response = $this->service->getSummonerRankedDataByName($region, $name);
        $playerInfo = $this->service->getSummonerProfileDataByName($region, $name);
        $matchHistory = $this->service->getMatchHistoryByName($region, $name);
        return view('details.summoner')->with([
            'data' => $response, 
            'playerInfo' => $playerInfo, 
            'playerRegion' => $region,
            'matchHistory' => $matchHistory]);
    }
}   