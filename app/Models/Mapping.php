<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapping extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'district_id', 'village_id', 'proposal_source', 'proposal_year', 'planning_year', 'planning', 'budget', 'execution_year', 'photo', 'population', 'condition', 'paving', 'type', 'status', 'length', 'width', 'polyline', 'created_by', 'updated_by'
    ];

    protected $casts = [
        'polyline' => 'json'
    ];

    function getMappingData($year = null) {
        return DB::select("
            SELECT `name`, `type`, `length`, `width`, `condition`, `village_id`, `district_id`, `paving`, `status`, ST_AsText(polyline) AS `polyline`
            FROM mappings
            WHERE `proposal_year` = ?
            ", [$year]);
    }

    function parseMultiPoint($wkt) {
        if (str_contains($wkt, '((')) {
            // Format MySQL
            $wkt = str_replace(['MULTIPOINT((', '))'], '', $wkt);
            $points = explode('),(', $wkt);
        } else {
            // Format MariaDB
            $wkt = str_replace(['MULTIPOINT(', ')'], '', $wkt);
            $points = explode(',', $wkt);
        }

        return array_map(function ($point) {
            [$lng, $lat] = preg_split('/\s+/', trim($point));
            return [(float) $lat, (float) $lng];
        }, $points);
    }

    public function getPolylineTextAttribute()
    {
        return DB::table($this->table)
            ->selectRaw('ST_AsText(polyline) as text')
            ->where('id', $this->id)
            ->value('text');
    }

    public function getPolylineArrayAttribute()
    {
        $wkt = $this->polyline_text;

        if (str_contains($wkt, '((')) {
            // Format MySQL
            $wkt = str_replace(['MULTIPOINT((', '))'], '', $wkt);
            $points = explode('),(', $wkt);
        } else {
            // Format MariaDB
            $wkt = str_replace(['MULTIPOINT(', ')'], '', $wkt);
            $points = explode(',', $wkt);
        }

        return array_map(function ($point) {
            [$lng, $lat] = preg_split('/\s+/', trim($point));
            return [(float) $lat, (float) $lng];
        }, $points);
    }


    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function district()
    {
        return $this->village?->district();
    }

        public function getVillageNameAttribute()
    {
        return $this->village?->name;
    }

    public function getDistrictNameAttribute()
    {
        return $this->village?->district?->name;
    }
}
