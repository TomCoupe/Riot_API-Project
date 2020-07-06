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

    public function getLeaderboards($region) {
        return $this->service->getLeaderboards($region);
    }
}
