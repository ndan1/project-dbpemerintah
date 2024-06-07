<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jadwal_kedatangan', function (Blueprint $table) {
            $table->id('kedatangan_id');
            $table->unsignedBigInteger('id_pembuatan')->nullable();
            $table->unsignedBigInteger('id_perpanjang')->nullable();
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->enum('status', ['pending', 'approved', 'rejected', 'failed', 'passed'])->default('pending');
            $table->integer('attempt_count')->default(0);
            $table->timestamps();

            $table->foreign('id_pembuatan')->references('id_pembuatan')->on('pembuatan_sim')->onDelete('cascade');
            $table->foreign('id_perpanjang')->references('id_perpanjang')->on('perpanjang_sim')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kedatangan');
    }
};
