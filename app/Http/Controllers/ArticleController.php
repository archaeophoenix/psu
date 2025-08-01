<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    public function index()
    {
        $years = Articles::select(DB::raw('DISTINCT YEAR(created_at) as year'))
                    ->orderBy('year', 'desc')
                    ->pluck('year');

        return view('Article.index', [
            'description' => 'Selamat datang di Artikel PSU',
            'title' => 'Artikel',
            'years' => $years
        ]);
    }

    public function create()
    {
        return view('Article.create', [
            'description' => 'Selamat datang di Form Artikel PSU',
            'title' => 'Form Artikel'
        ]);
    }

    public function edit($id)
    {
        $article = Articles::findOrFail($id);

        return view('Article.edit', [
            'title' => 'Selamat datang di Form Edit Artikel PSU',
            'description' => 'Perbarui data artikel',
            'article' => $article
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = new Articles();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = \Illuminate\Support\Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $article->img = 'images/' . $imageName;
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Artikel created successfully.');
    }

    public function update(Request $request, $id)
    {
        $article = Articles::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = \Illuminate\Support\Str::slug($request->title);

        if ($request->hasFile('img')) {

            if ($article->img) {
                $oldImagePath = public_path('images/' . $article->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $article->img = 'images/' . $imageName;
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Artikel updated successfully.');
    }
}
