<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\SummonerService;

class SummonerServiceTest extends TestCase
{   
    protected $service;

    public function setup(): void {
        $this->service = resolve(SummonerService::class);
    }

    public function testGetRegionEU() {
        $expected = 'euw1';
        $result = $this->service->getRegionId('EUW');
        $this->assertEquals($expected, $result);
    }

    public function testGetRegionNA() {
        $expected = 'us1';
        $result = $this->service->getRegionId('US');
        $this->assertEquals($expected, $result);
    }

    public function testGetRegionKR() {
        $expected = 'kr';
        $result = $this->service->getRegionId('KR');
        $this->assertEquals($expected, $result);
    }

    public function testGetRegionEUNE() {
        $expected = 'eun1';
        $result = $this->service->getRegionId('EUNE');
        $this->assertEquals($expected, $result);
    }

    public function testGetRegionFails() {
        $expected = false;
        $result = $this->service->getRegionId('North Korea');
        $this->assertEquals($expected, $result);
    }

    public function testGetSummonerProfileDataByName() {
        $name = 'Coupe';
        $result = $this->service->getSummonerProfileDataByName('EUW', $name);
        $this->assertNotNull($result);
        $this->assertEquals($name, $result['name']);
    }

    public function testGetSummonerRankedDataByName() {
        $name = 'Coupe';
        $expectedSoloDuo = 'RANKED_SOLO_5x5';
        $expectedFlex = 'RANKED_FLEX_SR';
        $result = $this->service->getSummonerRankedDataByName('EUW', $name);
        $this->assertNotNull($result);
        $soloDuo = $result[0];
        $flex = $result[1];
        $this->assertEquals($expectedSoloDuo, $soloDuo['queueType']);
        $this->assertEquals($expectedFlex, $flex['queueType']);
    }
    
}
