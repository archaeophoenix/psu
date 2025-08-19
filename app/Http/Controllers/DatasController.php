<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Mapping;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatasController extends Controller
{
    public function mappingsData(Request $request)
    {
        $year = $request->query('tahun', Carbon::now()->year);

        $query = Mapping::with('village.district')->where('proposal_year', $year);

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

        $mappings = Mapping::with('village.district')->where('proposal_year', $year)->get()->map(function ($mapping) {
            return [
                'id' => $mapping->id,
                'name' => $mapping->name,
                'type' => $mapping->type,
                'length' => $mapping->length,
                'width' => $mapping->width,
                'condition' => $mapping->condition,
                'paving' => $mapping->paving,
                'status' => $mapping->status,
                'polyline' => json_encode($mapping->geometry),
                'location' => $mapping->village_name,
                'village_id' => $mapping->village_id,
                'district' => $mapping->district_name,
                'district_id' => $mapping->district_id,
                'proposal_source' => $mapping->proposal_source,
                'proposal_year' => $mapping->proposal_year,
                'planning_year' => $mapping->planning_year,
                'execution_year' => $mapping->execution_year,
                'planning' => $mapping->planning,
                'budget' => $mapping->budget,
                'photo' => $mapping->photo,
                'population' => $mapping->population
            ];
        });

        return response()->json([
            'data' => $mappings,
            'message' => 'Data retrieved successfully'
        ]);

    }

    public function getArticles(Request $request)
    {
        $year = $request->query('tahun', Carbon::now()->year);
        $articles = DB::table('articles')
                    ->whereRaw('YEAR(created_at) = ?', [$year])
                    ->get();

        return response()->json([
            'data' => $articles,
            'message' => 'Data retrieved successfully'
        ]);
    }

}
