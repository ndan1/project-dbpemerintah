<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwalkedatangan_perpanjang', function (Blueprint $table) {
            $table->id('kedatanganperpanjang_id');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_perpanjang')->nullable();
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->enum('status', ['pending', 'approved', 'rejected', 'failed', 'passed'])->default('pending');
            $table->timestamps();

            $table->foreign('id_perpanjang')->references('id_perpanjang')->on('perpanjang_sim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalkedatangan_perpanjangan');
    }
};
