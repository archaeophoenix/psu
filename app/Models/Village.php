<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Village extends Model
{
    protected $fillable = ['id','name','polyline', 'created_by', 'updated_by','district_id'];
    public function district() {
        return $this->belongsTo(District::class);
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
        $text = $this->polyline_text;

        $wkt = str_replace(['MULTIPOINT((', '))'], '', $text);
        $points = explode('),(', $wkt);

        return array_map(function ($point) {
            [$lng, $lat] = explode(' ', trim($point));
            return [
                (float) $lat,
                (float) $lng,
            ];
        }, $points);
    }
}
