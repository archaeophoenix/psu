<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProposalController extends Controller
{

    public function index()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();

        return view('proposal.index2', [
            'villages' => collect(village())->groupBy('kecamatan_id'),
            'title' => 'Pengaduan',
            'description' => 'Selamat datang di Pengaduan PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }

    public function create()
    {
        $years = Mapping::select('proposal_year')->distinct()->get();
        return view('proposal.create', [
            'villages' => collect(village())->groupBy('kecamatan_id'),
            'title' => 'Form Pengaduan',
            'description' => 'Selamat datang di Form Pengaduan PSU',
            'years' => collect($years)->pluck('proposal_year')->toArray(),
        ]);
    }

    public function store(Request $request) {
        Mapping::create($request->all()); // C
        return redirect()->route('proposal.index');
    }


}
