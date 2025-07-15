<?php

namespace App\Models;

use Illuminate\Support\Arr;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Article //extends Model
{
    // use HasFactory;

    protected $guarded = ['id'];

    public static function getAllArticles()
    {
    }

    public static function getArticleBySlug($slug) : array
    {
        $article = Arr::first(self::getAllArticles(), fn($article) => $article['slug'] == $slug);

        return $article ?: null;
    }
}
