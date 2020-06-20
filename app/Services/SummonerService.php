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
        //getting last 20 games   
        for ($i = 0; $i < 20; $i++) {
            $result = $this->helper->getMatchDetails($region, $matches[$i]['gameId']);
            $player = $this->getSummonerMatchStatsByChampID($result['participants'], $matches[$i]['champion']);
            
            $arr[$i] = [
                'championKey' => $matches[$i]['champion'],
                'lane' => $matches[$i]['lane'],
                'gameLength' => $result['gameDuration'],
                'win' => $player['stats']['win'],
                'kills' => $player['stats']['kills'],
                'deaths' => $player['stats']['deaths'],
                'assists' => $player['stats']['assists'],
                'gold' => $player['stats']['goldEarned'],
                'championLevel' => $player['stats']['champLevel'],
                'allPlayers' => $result['participants'],
                'creepScore' => $player['stats']['totalMinionsKilled']
            ];
        }
        return $arr;
    }

    public function getSummonerMatchStatsByChampID($players, $champID) {
        foreach($players as $player) {
            if($player['championId'] == $champID) {
                return $player;
            }
        }
    }

    public function getChamps() {
        return $this->helper->getChamps();
    }
}