<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
        Menu::create([
            'label' => 'Dashboard',
            'mod_name'=>'dashboard',
            'sort_order'=>1
        ]);
       */
        Menu::create([
            'label' => 'Permohonan KK',
            'mod_name'=>'http://localhost/z/layanan_publik/public/portal/permintaan/1',
            'sort_order'=>2
        ]);

        Menu::create([
            'label' => 'Permohonan KTP',
            'mod_name'=>'http://localhost/z/layanan_publik/public/portal/permintaan/2',
            'sort_order'=>2
        ]);

        Menu::create([
            'label' => 'Jenis Layanan',
            'mod_name'=>'http://localhost/z/layanan_publik/public/portal/jenis_layanan',
            'sort_order'=>3
        ]);

        Menu::create([
            'label' => 'Pengguna',
            'mod_name'=>'http://localhost/z/layanan_publik/public/portal/user',
            'sort_order'=>4
        ]);


    }
}
