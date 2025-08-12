<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Models\District;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class MapController extends Controller
{
    public function index()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();

        $villages = District::with('villages')->get()->map(function ($mapping) {
            return [
                'id' => $mapping->id,
                'name' => $mapping->name,
                'villages' => $mapping->villages->map(function ($village) {
                    return [
                        'id' => $village->id,
                        'name' => $village->name,
                        'polyline' => implode(',', $village->polyline_array[0])
                    ];
                })->toArray()
            ];
        });

        return view('Map.index', [
            'villages' => $villages,
            'title' => 'Peta',
            'description' => 'Selamat datang di Peta PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }
}
