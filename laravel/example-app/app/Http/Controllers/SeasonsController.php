<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        /**
         * esse é o relacionamento
         * $seasons = $series->seasons();
         * essa é a coleção
         * $seasons = $series->seasons;
         */

        # pegando todas as temporadas ja com o epsisodios
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('series', $series);
    }
}
