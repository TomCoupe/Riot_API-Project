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
        $response = $this->service->getSummonerDataByName($region, $name);
        return view('details.summoner')->with('data', $response);
    }
}   