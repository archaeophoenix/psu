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
        $statuses = ['Usulan', 'Valid', 'Perencanaan', 'Eksisting'];
        $query = Mapping::query()->where('proposal_year', date('Y'));
        $statusData = [];

        foreach ($statuses as $status) {
            $statusData[$status] = (clone $query)->where('status', $status)->count();
        }

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
            'statusData'=> $statusData,
            'years' => collect($years)->pluck('proposal_year')->toArray(),
            'statusColor' => $statusColor,
            'statusIcon' => $statusIcon
        ]);
    }
}
