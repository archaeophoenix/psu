<?php

namespace Database\Seeders;
use App\Models\Articles;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('articles')->insert([
            [
                'title' => 'Artikel 1',
                'slug' => 'artikel-1',
                'created_at' => new DateTime('2025-07-01'),
                'updated_at' => new DateTime('2025-07-01'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel pertama. Ini adalah konten artikel pertama. Ini adalah konten artikel pertama. Ini adalah konten artikel pertama.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
            [
                'title' => 'Artikel 2',
                'slug' => 'artikel-2',
                'created_at' => new DateTime('2025-07-02'),
                'updated_at' => new DateTime('2025-07-02'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel kedua. Ini adalah konten artikel kedua. Ini adalah konten artikel kedua. Ini adalah konten artikel kedua.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
            [
                'title' => 'Artikel 3',
                'slug' => 'artikel-3',
                'created_at' => new DateTime('2025-07-03'),
                'updated_at' => new DateTime('2025-07-03'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel ketiga. Ini adalah konten artikel ketiga. Ini adalah konten artikel ketiga. Ini adalah konten artikel ketiga.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
            [
                'title' => 'Artikel 4',
                'slug' => 'artikel-4',
                'created_at' => new DateTime('2025-07-04'),
                'updated_at' => new DateTime('2025-07-04'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel keempat. Ini adalah konten artikel keempat. Ini adalah konten artikel keempat. Ini adalah konten artikel keempat.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
            [
                'title' => 'Artikel 5',
                'slug' => 'artikel-5',
                'created_at' => new DateTime('2025-07-05'),
                'updated_at' => new DateTime('2025-07-05'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel kelima. Ini adalah konten artikel kelima. Ini adalah konten artikel kelima. Ini adalah konten artikel kelima.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
            [
                'title' => 'Artikel 6',
                'slug' => 'artikel-6',
                'created_at' => new DateTime('2025-07-06'),
                'updated_at' => new DateTime('2025-07-06'),
                'created_by' => 1,
                'updated_by' => 1,
                'content' => 'Ini adalah konten artikel keenam. Ini adalah konten artikel keenam. Ini adalah konten artikel keenam. Ini adalah konten artikel keenam.',
                'img' => '../assets/images/light-box/l3.jpg',
            ],
        ]);
    }
}
