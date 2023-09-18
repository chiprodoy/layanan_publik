<?php

use App\Models\JenisLayanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarat_jenis_layanans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(JenisLayanan::class);
            $table->string('nama_persyaratan');
            $table->string('label_persyaratan');
            $table->string('tipe_persyaratan'); // text,numeric,file,textarea,{option:[{text:'pria',value:'p'},{text:'wanita',value:'w'}]}
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syarat_jenis_layanans');
    }
};
