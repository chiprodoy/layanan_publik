<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Berita',
            'slugs' => 'berita'
        ]);
        // 2
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Profil',
            'slugs' => 'about'
        ]);

        // 3
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Prosedur Dan Regulasi',
            'slugs' => 'prosedur-dan-regulasi'
        ]);

        // 4
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'headline',
            'slugs'=>'headline'
        ]);

        // 5
        PostCategory::create([
            'uuid'=>'-',
            'parent_category_id'=>2,
            'name' => 'Sambutan',
            'slugs' => 'sambutan'
        ]);

        // 6
        PostCategory::create([
            'uuid'=>'-',
            'parent_category_id'=>2,
            'name' => 'Fasilitas',
            'slugs' => 'fasilitas'
        ]);
        // 7
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Pengumuman',
            'slugs' => 'pengumuman'
        ]);
        // 8
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Prestasi',
            'slugs' => 'prestasi'
        ]);

               // 9
        PostCategory::create([
            'uuid'=>'-',
            'name' => 'Kerja Sama',
            'slugs' => 'kerja-sama'
        ]);
    }
}
