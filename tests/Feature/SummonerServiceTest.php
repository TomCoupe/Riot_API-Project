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
    
}
