<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Mapping extends Model
{
    protected $fillable = [
        'name', 'location', 'proposal_source', 'proposal_year', 'planning_year',
        'execution_year', 'condition', 'paving', 'type', 'status',
        'created_by', 'updated_by', 'length', 'width', 'polyline'
    ];

    protected $casts = [
        'polyline' => 'json'
    ];

    function getMappingData($year = null) {
        return DB::select("
            SELECT `name`, `type`, `length`, `width`, `condition`, `location`, `paving`, `status`, ST_AsText(polyline) AS `polyline`
            FROM mappings
            WHERE `proposal_year` = ?
            ", [$year]);
    }

    function parseMultiPoint($wkt) {
        $wkt = str_replace(['MULTIPOINT((', '))'], '', $wkt);
        $points = explode('),(', $wkt);

        return array_map(function ($point) {
            [$lng, $lat] = explode(' ', trim($point));
            return [
                (float) $lat,
                (float) $lng,
            ];
        }, $points);
    }

    public static function getAllMapping($year = null) : array {
        $instance = new static();
        $year = $year ?: Carbon::now()->year;
        $mappings = $instance->getMappingData($year);
        $result = [];

        foreach ($mappings as $mapping) {
            $result[] = [
                'name' => $mapping->name,
                'type' => $mapping->type,
                'length' => $mapping->length,
                'width' => $mapping->width,
                'condition' => $mapping->condition,
                'location' => $mapping->location,
                'paving' => $mapping->paving,
                'status' => $mapping->status,
                'polyline' => json_encode($instance->parseMultiPoint($mapping->polyline)),
            ];
        }

        return $result;

    }
}
