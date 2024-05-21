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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('customer_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('name_pegawai');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('perpanjang_sim', function (Blueprint $table) {
            $table->id('id_perpanjang');
            $table->id('id_customer');
            $table->string('foto_ktp');
            $table->string('pas_foto');
            $table->string('surat_sehat');
            $table->string('foto_sim');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_customer')->references('id_customer')->on('customer');
        });
        Schema::create('pembuatan_sim', function (Blueprint $table) {
            $table->id('id_pembuatan');
            $table->id('id_customer');
            $table->string('foto_ktp');
            $table->string('pas_foto');
            $table->string('surat_sehat');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_customer')->references('id_customer')->on('customer');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('perpanjang_sim');
        Schema::dropIfExists('pembuatan_sim');
    }
};
