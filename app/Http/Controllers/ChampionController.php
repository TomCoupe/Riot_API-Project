<?php

namespace App\Http\Controllers;

class ChampionController extends Controller {

    public function showChampion($name) {   
        $champName = json_encode($name);
        return view('details.champion')->with('name', $champName);
    }
}
