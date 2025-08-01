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
}
