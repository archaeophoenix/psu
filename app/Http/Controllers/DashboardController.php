<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();
        $counts = Mapping::query()
                    ->select('status', DB::raw('COUNT(*) as total'))
                    ->whereIn('status', ['Usulan','Valid','Perencanaan','Eksisting'])
                    ->where('proposal_year', date('Y'))
                    ->groupBy('status')
                    ->get()->toArray();
        $statusColor = [
            'Usulan' => 'red-900',
            'Valid' => 'warning',
            'Perencanaan' => 'danger',
            'Eksisting' => 'success',
        ];
        $statusIcon= [
            'Usulan' =>'map-pin-share',
            'Valid' =>'route-x',
            'Perencanaan' =>'map-pins',
            'Eksisting' =>'map-check',
        ];


        return view('dashboard.index', [
            'title' => 'Dashboard',
            'description' => 'Selamat datang di Dashboard PSU',
            'counts'=> $counts,
            'years' => collect($years)->pluck('proposal_year')->toArray(),
            'statusColor' => $statusColor,
            'statusIcon' => $statusIcon
        ]);
    }
}
