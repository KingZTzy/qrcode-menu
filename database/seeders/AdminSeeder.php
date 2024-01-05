<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [[
            'name' => 'Ipung',
            'email' => 'ipungdesu@yahoo.com',
            'roles' => 'admin',
            'password' => bcrypt('12345'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'name' => 'Arya',
            'email' => 'aryaicikiwir@gmail.com',
            'roles' => 'admin',
            'password' => bcrypt('12345'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'roles' => 'admin',
            'password' => bcrypt('12345'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]];

        User::insert($datas);

        // $admin = new \App\Models\User();

        // $admin->name = 'Ipung';
        // $admin->email = 'ipungdesu@yahoo.com';
        // $admin->roles = 'admin';
        // $admin->password = bcrypt('12345');
        // $admin->save();
        // $this->command->info('Data User Berhasil Di Insert!');


        // $admin = new \App\Models\User();

        // $admin->name = 'Arya';
        // $admin->email = 'aryaicikiwir@gmail.com';
        // $admin->roles = 'karyawan';
        // $admin->password = bcrypt('12345');
        // $admin->save();
        // $this->command->info('Data User Berhasil Di Insert!');
    }
}
