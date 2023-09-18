<?php

use App\Models\JenisLayanan;
use App\Models\StatusPermintaan;
use App\Models\User;
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
        Schema::create('permintaan_layanans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nomor_permintaan');
            $table->string('nama');
            $table->string('email');
            $table->string('nmr_tlpon');
            $table->string('alamat');
            $table->text('catatan')->nullable();
//            $table->json('persyaratan');
            $table->foreignIdFor(User::class,'staff_id')->nullable();
            $table->foreignIdFor(User::class,'pemohon_id');
            $table->integer('status_permintaan_id')->default(1);
            $table->boolean('isClosed')->default(0);
            $table->foreignIdFor(JenisLayanan::class);
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
        Schema::dropIfExists('permintaan_layanans');
    }
};
