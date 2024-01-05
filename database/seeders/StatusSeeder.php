<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [[
            'status' => 'Tersedia',
            'slug' => Str::slug('tersedia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'status' => 'Tidak Tersedia',
            'slug' => Str::slug('tidak-tersedia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]];

        Status::insert($datas);
    }
}
