<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pendidikan;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'uuid'=>'-',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'nomor_telpon'=>'00000',
            //'tempat_lahir'=>'palembang',
            //'tgl_lahir'=>'1986-02-24',
            //'pekerjaan'=>'admin',
            //'pendidikan'=>Pendidikan::S1,
            'password' => 'password']);

        User::find(1)->roles()->attach(1,['user_modify'=>'su']);

        $user= User::create([
            'uuid'=>'-',
            'name' => 'pengguna',
            'email' => 'pengguna@gmail.com',
            'nomor_telpon'=>'000001',
            //'tempat_lahir'=>'palembang',
            //'tgl_lahir'=>'1986-02-24',
            //'pekerjaan'=>'admin',
            //'pendidikan'=>Pendidikan::S1,
            'password' => 'password']);

        $user->roles()->attach(2,['user_modify'=>'su']);

        $user= User::create([
            'uuid'=>'-',
            'name' => 'operator01',
            'email' => 'operator01@gmail.com',
            'nomor_telpon'=>'000002',
            //'tempat_lahir'=>'palembang',
            //'tgl_lahir'=>'1986-02-24',
            //'pekerjaan'=>'admin',
            //'pendidikan'=>Pendidikan::S1,
            'password' => 'password']);

        $user->roles()->attach(3,['user_modify'=>'su']);

        $user= User::create([
            'uuid'=>'-',
            'name' => 'operator02',
            'email' => 'operator02@gmail.com',
            'nomor_telpon'=>'000003',
            //'tempat_lahir'=>'palembang',
            //'tgl_lahir'=>'1986-02-24',
            //'pekerjaan'=>'admin',
            //'pendidikan'=>Pendidikan::S1,
            'password' => 'password']);

        $user->roles()->attach(4,['user_modify'=>'su']);

        $user= User::create([
            'uuid'=>'-',
            'name' => 'operator03',
            'email' => 'operator03@gmail.com',
            'nomor_telpon'=>'000004',
            //'tempat_lahir'=>'palembang',
            //'tgl_lahir'=>'1986-02-24',
            //'pekerjaan'=>'admin',
            //'pendidikan'=>Pendidikan::S1,
            'password' => 'password']);

        $user->roles()->attach(5,['user_modify'=>'su']);
    }
}
