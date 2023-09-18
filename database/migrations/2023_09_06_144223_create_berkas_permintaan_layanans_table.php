<?php

use App\Models\PermintaanLayanan;
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
        Schema::create('berkas_permintaan_layanans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(PermintaanLayanan::class);
            $table->string('nama_persyaratan');
            $table->string('label_persyaratan');
            $table->string('tipe_persyaratan');
            $table->string('berkas');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_permintaan_layanans');
    }
};
