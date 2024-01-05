<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [[
            'nama_kategori' => 'Makanan',
            'slug' => Str::slug('Makanan'),
            'icon' => 'hamburger',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'nama_kategori' => 'Minuman',
            'slug' => Str::slug('Minuman'),
            'icon' => 'mug-hot',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'nama_kategori' => 'Cemilan',
            'slug' => Str::slug('Cemilan'),
            'icon' => 'hotdog',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'nama_kategori' => 'Lainnya',
            'slug' => Str::slug('Lainnya'),
            'icon' => 'tags',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]];

        Category::insert($datas);
    }
}
