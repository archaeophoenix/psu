<?php
namespace App\Http\Controllers;

use App\Models\Mapping;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function chartData(Request $request)
    {
        $year = $request->query('tahun');
        $kec = $request->query('kecamatan');
        $paving = $request->query('perkerasan');

        $query = Mapping::query()->whereIn('type', ['Jalan', 'Drainase']);

        if ($year) {
            $query->where('proposal_year', $year);
        }

        if ($kec) {
            $query->where('location', $kec);
        }

        if ($paving) {
            $query->where('paving', $paving);
        }

        // RADIAL DATA
        $conditions = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];
        $radialData = [];
        foreach ($conditions as $cond) {
            $radialData[] = (clone $query)->where('condition', $cond)->count();
        }

        // BAR DATA
        $bar = [
            'jalan' => [],
            'drainase' => [],
            'bulan' => []
        ];

        for ($i = 1; $i <= 12; $i++) {
            $bar['bulan'][] = Carbon::create(null, $i)->format('M');

            $jalan = (clone $query)->where('type', 'Jalan')
                ->whereMonth('created_at', $i)
                ->count();

            $drain = (clone $query)->where('type', 'Drainase')
                ->whereMonth('created_at', $i)
                ->count();

            $bar['jalan'][] = $jalan;
            $bar['drainase'][] = $drain;
        }

        return response()->json([
            'radial' => $radialData,
            'bar' => $bar
        ]);
    }
}
