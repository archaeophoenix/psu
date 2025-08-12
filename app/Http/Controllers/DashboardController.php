<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use App\Models\District;
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
            'Usulan' => 'danger',
            'Valid' => 'warning',
            'Perencanaan' => 'red-900',
            'Eksisting' => 'success',
        ];
        $statusIcon= [
            'Usulan' =>'map-pin-share',
            'Valid' =>'route-x',
            'Perencanaan' =>'map-pins',
            'Eksisting' =>'map-check',
        ];

        $villages = District::get()->map(function ($mapping) {
            return [
                'id' => $mapping->id,
                'name' => $mapping->name,
            ];
        });


        return view('Dashboard.index', [
            'title' => 'Dashboard',
            'villages' => $villages,
            'description' => 'Selamat datang di Dashboard PSU',
            'statusData'=> $statusData,
            'years' => collect($years)->pluck('proposal_year')->toArray(),
            'statusColor' => $statusColor,
            'statusIcon' => $statusIcon
        ]);
    }
}
