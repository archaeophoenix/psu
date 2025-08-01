<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $articles = Articles::orderBy('created_at','desc')->take(15)->get()->toArray();
        $years = Mapping::select('proposal_year')->distinct()->get();
        $counts = Mapping::query()
                    ->select('type', DB::raw('COUNT(*) as total'))
                    ->whereIn('type', ['Drainase', 'Jalan'])
                    ->groupBy('type')
                    ->get()->toArray();

        $articles = collect($articles);
        $articles = $articles->chunk(3);
        $articles->toArray();
        $districts = District::with('villages')->get()->map(function ($mapping) {
            return [
                'id' => $mapping->id,
                'name' => $mapping->name,
                'villages' => $mapping->villages->map(function ($village) {
                    return [
                        'id' => $village->id,
                        'name' => $village->name
                    ];
                })->toArray()
            ];
        });

        return view('Home.index', [
            'districts' => $districts,
            'villages' => collect(village())->groupBy('kecamatan_id'),
            'description' => 'Selamat datang di Beranda PSU',
            'articles' => $articles,
            'title' => 'Beranda',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
            'counts' => $counts
        ]);
    }
}
