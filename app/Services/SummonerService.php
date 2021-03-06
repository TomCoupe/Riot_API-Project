<?php

namespace App\Services;

use App\RiotHelpers\SummonerAPIHelper;

class SummonerService
{

    protected $helper;

    public function __construct(SummonerAPIHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getRegionId($region)
    {
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
    public function getSummonerProfileDataByName($region, $name)
    {
        $region = $this->getRegionId($region);
        $profileInfo = $this->helper->getSummonerByName($region, $name);
        return $profileInfo;
    }

    public function getSummonerRankedDataByName($region, $name)
    {
        $region = $this->getRegionId($region);
        $summoner = $this->helper->getRankedInformationByName($region, $name);
        return $summoner;
    }

    public function getLeaderboards($reg) {
        $region = $this->getRegionId($reg);
        $summoners = $this->helper->getChallengerLeaderboards($region);
        $arr = [];
        for ($i = 0; $i < 20; $i++) {
            $arr[] = $summoners['entries'][$i];
        }
        return $arr;
    }

    public function getMatchHistoryByName($region, $name)
    {
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
                'creepScore' => $player['stats']['totalMinionsKilled'],
                'champLevel' => $player['stats']['champLevel'],
                'items' => [
                    'item1' => $player['stats']['item0'],
                    'item2' => $player['stats']['item1'],
                    'item3' => $player['stats']['item2'],
                    'item4' => $player['stats']['item3'],
                    'item5' => $player['stats']['item4'],
                    'item6' => $player['stats']['item5']
                ],
                'team1' => [
                    'player1' => $result['participants'][0]['championId'],
                    'player2' => $result['participants'][1]['championId'],
                    'player3' => $result['participants'][2]['championId'],
                    'player4' => $result['participants'][3]['championId'],
                    'player5' => $result['participants'][4]['championId'],
                ],
                'team2' => [
                    'player1' => $result['participants'][5]['championId'],
                    'player2' => $result['participants'][6]['championId'],
                    'player3' => $result['participants'][7]['championId'],
                    'player4' => $result['participants'][8]['championId'],
                    'player5' => $result['participants'][9]['championId']
                ]
            ];
        }
        return $arr;
    }

    public function getSummonerMatchStatsByChampID($players, $champID)
    {
        foreach ($players as $player) {
            if ($player['championId'] == $champID) {
                return $player;
            }
        }
    }

    public function getChamps()
    {
        return $this->helper->getChamps();
    }
}
