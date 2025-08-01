<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Models\District;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
{
    public function index()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();

        return view('Proposal.index', [
            'title' => 'Pengaduan',
            'description' => 'Selamat datang di Pengaduan PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }

    public function approve(Request $request, $id)
    {
        $mapping = Mapping::find($id);

        if (!$mapping) {
            return redirect()->route('proposal.index')->withErrors(['id' => 'ID tidak ditemukan.']);
        }

        $request->validate([
            'budget' => 'required|file|mimes:pdf',
            'planning' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('budget')) {
            $imageName = time() . '-budget.' . $request->budget->extension();
            $request->budget->move(public_path('mapping'), $imageName);
            $mapping->budget = 'mapping/' . $imageName;
        }

        if ($request->hasFile('planning')) {
            $imageName = time() . '-planning.' . $request->planning->extension();
            $request->planning->move(public_path('mapping'), $imageName);
            $mapping->planning = 'mapping/' . $imageName;
        }

        $mapping->save();

        return redirect()->route('proposal.index')->with('success', 'Pengaduan berhasil diperbarui.');

    }

    public function action($id){
        $mapping = Mapping::with('village.district')->find($id)->toArray();

        if (!$mapping) {
            return redirect()->route('proposal.index')->withErrors(['id' => 'ID tidak ditemukan.']);
        }

        $condition = [
            'Baik' => 'success',
            'Rusak Ringan' => 'warning',
            'Rusak Sedang' => 'danger',
            'Rusak Berat' => 'red-900'
        ];

        $status = [
            'Usulan' => 'red-900',
            'Valid' => 'warning',
            'Perencanaan' => 'danger',
            'Eksisting' => 'success'
        ];

        $paving = [
            'Aspal' => 'success',
            'Beton' => 'warning',
            'Tanah' => 'danger'
        ];

        $population = [
            'Tinggi' => 'danger',
            'Sedang' =>'warning',
            'Rendah' =>'success'
        ];

        return view('Proposal.action', [
            'condition' => $condition,
            'status' => $status,
            'paving' => $paving,
            'population' => $population,
            'mapping' => $mapping,
            'title' => 'Form Aproval Pengaduan',
            'description' => 'Selamat datang di Form Aproval Pengaduan PSU',
        ]);
    }

    public function create()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();

        $districts = District::with('villages')->get()->map(function ($district) {
            return [
                'id' => $district->id,
                'name' => $district->name,
                'polyline' => $district->polyline_array,
                'villages' => $district->villages->map(function ($village) {
                    return [
                        'id' => $village->id,
                        'name' => $village->name,
                        'polyline' => $village->polyline_array
                    ];
                })->toArray()
            ];
        });

        return view('Proposal.create', [
            'districts' => $districts,
            'title' => 'Form Pengaduan',
            'description' => 'Selamat datang di Form Pengaduan PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }

    public function store(Request $request) {
        $uploadedPaths = [];

        $request->validate([
            'district_id' => 'required|string',
            'village_id' => 'required|string',
            'name' => 'required|string',
            'proposal_source' => 'required|string',
            'length' => 'required|integer',
            'width' => 'required|integer',
            'condition' => 'required|string',
            'population' => 'required|string',
            'type' => 'required|string',
            'paving' => 'required|string',
            'polyline' => 'required|string',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'photo' => 'required|array',
        ]);

        $polyline = json_decode($request->polyline, true);

        if (!is_array($polyline) || count($polyline) < 1) {
            return back()->withErrors(['polyline' => 'Format koordinat salah atau kosong.']);
        }

        $wktPoints = array_map(function ($point) {
            return "({$point[1]} {$point[0]})";
        }, $polyline);

        $wkt = 'MULTIPOINT(' . implode(',', $wktPoints) . ')';

        $mapping = new Mapping();
        $mapping->district_id = $request->district_id;
        $mapping->village_id = $request->village_id;
        $mapping->name = $request->name;
        $mapping->proposal_source = $request->proposal_source;
        $mapping->length = $request->length;
        $mapping->width = $request->width;
        $mapping->condition = $request->condition;
        $mapping->population = $request->population;
        $mapping->type = $request->type;
        $mapping->paving = $request->paving;
        $mapping->proposal_year = date('Y');
        $mapping->planning_year = date('Y');

        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $key => $photo) {
                $imageName = time() . '-' . $key . '.' . $photo->extension();
                $photo->move(public_path('mapping'), $imageName);
                $uploadedPaths[] = 'mapping/' . $imageName;
            }
        }

        $mapping->photo = json_encode($uploadedPaths);

        $mapping->save();
        DB::update("UPDATE mappings SET polyline = ST_GeomFromText(?) WHERE id = ?", [$wkt, $mapping->id]);

        return redirect()->route('proposal.index');
    }

}
