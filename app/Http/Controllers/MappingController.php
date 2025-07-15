<?php
namespace App\Http\Controllers;

use App\Models\Mapping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    public function mappingsData(Request $request)
    {
        $year = $request->query('tahun', Carbon::now()->year);

        $query = Mapping::query();

        if ($year) {
            $query->where('proposal_year', $year);
        }

        $mappings = $query->get();

        return response()->json([
            'data' => $mappings,
            'tahun' => $year
        ]);
    }

    public function getAllMapping(Request $request)
    {
        $year = $request->query('tahun', Carbon::now()->year);

        $mappings = Mapping::getAllMapping($year);

        return response()->json([
            'data' => $mappings,
            'message' => 'Data retrieved successfully'
        ]);
    }
}
