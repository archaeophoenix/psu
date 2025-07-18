<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Mapping;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    public function index()
    {
        $years = Articles::select(DB::raw('DISTINCT YEAR(created_at) as year'))
                    ->orderBy('year', 'desc')
                    ->pluck('year');

        return view('article.index', [
            'description' => 'Selamat datang di Artikel PSU',
            'title' => 'Artikel',
            'years' => $years
        ]);
    }
}
