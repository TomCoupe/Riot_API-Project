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
                return response('invalid region provided', 422);
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
}