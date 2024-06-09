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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->unsignedBigInteger('id_pembuatan')->nullable();
            $table->unsignedBigInteger('id_perpanjang')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_proof');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('id_pembuatan')->references('id_pembuatan')->on('pembuatan_sim')->onDelete('cascade');
            $table->foreign('id_perpanjang')->references('id_perpanjang')->on('perpanjang_sim')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
