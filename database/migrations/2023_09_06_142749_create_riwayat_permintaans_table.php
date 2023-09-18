<?php

use App\Models\PermintaanLayanan;
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
        Schema::create('riwayat_permintaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PermintaanLayanan::class);
            $table->integer('status_permintaan_id');
            $table->foreignIdFor(User::class,'petugas_id');
            $table->text('catatan_petugas');
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
        Schema::dropIfExists('riwayat_permintaans');
    }
};
