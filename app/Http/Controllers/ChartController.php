<?php

namespace App\Http\Controllers;

use App\Models\Mapping;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function chartData(Request $request)
    {
        $kec = $request->query('kecamatan');
        $paving = $request->query('perkerasan');
        $type = $request->query('type') ?: 'Jalan' ;
        $status = $request->query('status') ?: 'Usulan' ;
        $year = $request->query('tahun', Carbon::now()->year);

        $query = Mapping::query();

        if ($year) {
            $query->where('proposal_year', $year);
        }

        if ($kec) {
            $query->where('district_id', $kec);
        }

        if ($paving) {
            $query->where('paving', $paving);
        }

        // RADIAL DATA
        $conditions = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];
        $radialData = [];
        foreach ($conditions as $cond) {
            $radialData['dinamic'][] = (clone $query)->where('condition', $cond)->where('type', $type)->where('status', $status)->count();
            $radialData['static'][] = (clone $query)->where('condition', $cond)->where('type', $type)->whereIn('status', ['Eksisting', 'Valid'])->count();
        }

        // BAR DATA
        $bar = [];

        for ($i = 1; $i <= 12; $i++) {
            $bar['bulan'][] = Carbon::create(null, $i)->format('M');

            $bar['jalan'][0]['name'] = 'Data Masuk Jalan Perencanaan';
            $bar['jalan'][0]['group'] = 'Jalan';
            $bar['jalan'][0]['data'][] = (clone $query)->where('type', 'Jalan')->whereMonth('created_at', $i)->where('status', 'Perencanaan')->count();

            $bar['jalan'][1]['name'] = 'Data Masuk Jalan Usulan';
            $bar['jalan'][1]['group'] = 'Jalan';
            $bar['jalan'][1]['data'][] = (clone $query)->where('type', 'Jalan')->whereMonth('created_at', $i)->where('status', 'Usulan')->count();

            $bar['jalan'][2]['name'] = 'Data Masuk Jalan Valid';
            $bar['jalan'][2]['group'] = 'Jalan';
            $bar['jalan'][2]['data'][] = (clone $query)->where('type', 'Jalan')->whereMonth('created_at', $i)->where('status', 'Valid')->count();

            $bar['jalan'][3]['name'] = 'Data Masuk Jalan Eksisting';
            $bar['jalan'][3]['group'] = 'Jalan';
            $bar['jalan'][3]['data'][] = (clone $query)->where('type', 'Jalan')->whereMonth('created_at', $i)->where('status', 'Eksisting')->count();

            $bar['drainase'][0]['name'] = 'Data Masuk Drainase Perencanaan';
            $bar['drainase'][0]['group'] = 'Drainase';
            $bar['drainase'][0]['data'][] = (clone $query)->where('type', 'Drainase')->whereMonth('created_at', $i)->where('status', 'Perencanaan')->count();

            $bar['drainase'][1]['name'] = 'Data Masuk Drainase Usulan';
            $bar['drainase'][1]['group'] = 'Drainase';
            $bar['drainase'][1]['data'][] = (clone $query)->where('type', 'Drainase')->whereMonth('created_at', $i)->where('status', 'Usulan')->count();

            $bar['drainase'][2]['name'] = 'Data Masuk Drainase Valid';
            $bar['drainase'][2]['group'] = 'Drainase';
            $bar['drainase'][2]['data'][] = (clone $query)->where('type', 'Drainase')->whereMonth('created_at', $i)->where('status', 'Valid')->count();

            $bar['drainase'][3]['name'] = 'Data Masuk Drainase Eksisting';
            $bar['drainase'][3]['group'] = 'Drainase';
            $bar['drainase'][3]['data'][] = (clone $query)->where('type', 'Drainase')->whereMonth('created_at', $i)->where('status', 'Eksisting')->count();
        }

        return response()->json([
            'radial' => $radialData,
            'bar' => $bar
        ]);
    }
}
