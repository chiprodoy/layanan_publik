<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use App\Models\TipePersyaratan;
use App\View\Components\Viho\Form\InputFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $layanan=JenisLayanan::create([
            'jenis_layanan' => 'Pembuatan KK',
            'deskripsi_jenis_layanan'=>'Pengajuan pembuatan KK baru',
            'uuid'=>'-'
        ]);

        $layanan->syarat_jenis_layanan()->createMany([
            [
                'nama_persyaratan'=>'surat-pengantar',
                'label_persyaratan'=>'Surat Pengantar',
                'tipe_persyaratan'=>TipePersyaratan::InputFile,
                'uuid'=>'-'
            ],
            [
                'nama_persyaratan'=>'akta-kelahiran',
                'label_persyaratan'=>'Akta Kelahiran',
                'tipe_persyaratan'=>TipePersyaratan::InputFile,
                'uuid'=>'-'

            ]
        ]);

        // 2
        JenisLayanan::create([
            'jenis_layanan' => 'Perbaikan KK',
            'deskripsi_jenis_layanan'=>'Perbaikan KK, penambahan anggota',
            'uuid'=>'-'

        ]);

        // 3
        $layanan=JenisLayanan::create([
            'jenis_layanan' => 'Pembuatan KTP',
            'deskripsi_jenis_layanan'=>'Pengajuan pembuatan KTP',
            'uuid'=>'-'

        ]);

        $layanan->syarat_jenis_layanan()->createMany([
            [
                'nama_persyaratan'=>'surat-pengantar',
                'label_persyaratan'=>'Surat Pengantar',
                'tipe_persyaratan'=>TipePersyaratan::InputFile,
                'uuid'=>'-'

            ],
            [
                'nama_persyaratan'=>'kartu-keluarga',
                'label_persyaratan'=>'Kartu Keluarga',
                'tipe_persyaratan'=>TipePersyaratan::InputFile,
                'uuid'=>'-'

            ]
        ]);

        // 4
        JenisLayanan::create([
            'jenis_layanan' => 'Perpanjangan KTP',
            'deskripsi_jenis_layanan'=>'Pengajuan pembuatan KTP',
            'uuid'=>'-'

        ]);

        // 5
        JenisLayanan::create([
            'jenis_layanan' => 'Izin Reklame',
            'deskripsi_jenis_layanan'=>'pengurusan izin pemasangan reklame',
            'uuid'=>'-'

        ]);

        // 6
        JenisLayanan::create([
            'jenis_layanan' => 'Izin Usaha',
            'deskripsi_jenis_layanan'=>'pengurusan izin usaha mikro dan kecil',
            'uuid'=>'-'

        ]);

        // 7
        JenisLayanan::create([
            'jenis_layanan' => 'IMB',
            'deskripsi_jenis_layanan'=>'pengurusan izin mendirikan bangunan',
            'uuid'=>'-'

        ]);
        //
    }
}
