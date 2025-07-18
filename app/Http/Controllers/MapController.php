<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class MapController extends Controller
{
    public function index()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();

        return view('map.index', [
            'villages' => collect(village())->groupBy('kecamatan_id'),
            'title' => 'Peta',
            'description' => 'Selamat datang di Peta PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }
}
