<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::insert([
            [
                "id" => 640801,
                "name" => "Muara Ancalong",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.5159658702 0.453737955)')")
            ],
            [
                "id" => 640802,
                "name" => "Muara Wahau",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.582566846 1.4177714017)')")
            ],
            [
                "id" => 640803,
                "name" => "Muara Bengkal",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7993719605 0.4012735288)')")
            ],
            [
                "id" => 640804,
                "name" => "Sangatta Utara",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5245240291 0.5607460964)')")
            ],
            [
                "id" => 640805,
                "name" => "Sangkulirang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.0489423241 1.064738179)')")
            ],
            [
                "id" => 640806,
                "name" => "Busang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.2971201165 0.9792809647)')")
            ],
            [
                "id" => 640807,
                "name" => "Telen",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7876394231 0.9615467073)')")
            ],
            [
                "id" => 640808,
                "name" => "Kombeng",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.0307713532 1.2747620301)')")
            ],
            [
                "id" => 640809,
                "name" => "Bengalon",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.432501723 0.8959268701)')")
            ],
            [
                "id" => 640810,
                "name" => "Kaliorang",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.8695918838 0.866722672)')")
            ],
            [
                "id" => 640811,
                "name" => "Sandaran",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(118.5282680072 1.0008702775)')")
            ],
            [
                "id" => 640812,
                "name" => "Sangatta Selatan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3254440956 0.4341559968)')")
            ],
            [
                "id" => 640813,
                "name" => "Teluk Pandan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.3349219307 0.1934201905)')")
            ],
            [
                "id" => 640814,
                "name" => "Rantau Pulung",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.1944386269 0.6384030794)')")
            ],
            [
                "id" => 640815,
                "name" => "Kaubun",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.7900435731 1.0433720688)')")
            ],
            [
                "id" => 640816,
                "name" => "Karangan",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(117.5814862555 1.3174448353)')")
            ],
            [
                "id" => 640817,
                "name" => "Batu Ampar",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.8958841456 0.6705422268)')")
            ],
            [
                "id" => 640818,
                "name" => "Long Mesangat",
                "polyline" => DB::raw("ST_GeomFromText('MULTIPOINT(116.7056990015 0.6156960997)')")
            ]
        ]);
    }
}
