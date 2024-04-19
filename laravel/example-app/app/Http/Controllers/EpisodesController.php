<?php

namespace App\Http\Controllers;

use App\Models\Season;

class EpisodesController
{
    public function index(Season $season)
    {
        //dd($season);
        return view('episodes.index', ['episodes' => $season->episodes]);
    }
}
