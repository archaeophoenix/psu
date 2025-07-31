<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class District extends Model
{
    protected $fillable = ['id','name','polyline', 'created_by', 'updated_by'];

    public function villages() {
        return $this->hasMany(Village::class);
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
