<?php
namespace App\Services;

use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\LeagueAPI\Definitions\Region;
use Illuminate\Support\Facades\Http;
use App\RiotHelpers\SummonerAPIHelper;

class SummonerService {

    protected $helper;

    public function __construct(SummonerAPIHelper $helper) {
        $this->helper = $helper;
    }

    public function getRegionId($region) {
        switch ($region) {
            case 'EUW':
                return 'euw1';
            case 'US':
                return 'us1';
            case 'KR':
                return 'kr';
            case 'EUNE':
                return 'eun1';
            default:
                return false;
        }
    }
    public function getSummonerProfileDataByName($region, $name) {
        $region = $this->getRegionId($region);
        $profileInfo = $this->helper->getSummonerByName($region, $name);
        return $profileInfo;
    }

    public function getSummonerRankedDataByName($region, $name) {
        $region = $this->getRegionId($region);
        $summoner = $this->helper->getRankedInformationByName($region, $name);
        return $summoner;
    }
    public function getMatchHistoryByName($region, $name) {
        $region = $this->getRegionId($region);
        $history = $this->helper->getMatchHistoryOfSummoner($region, $name);
        $matches = $history['matches'];
        $arr = [];      
        for ($i = 0; $i < 5; $i++) {
            $result = $this->helper->getMatchDetails($region, $matches[$i]['gameId']);
            $arr[$i] = [
                'details' => $result, 
                'match' => $matches[$i]
            ];
        }
        // dd($arr);
        return $arr;
    }
}