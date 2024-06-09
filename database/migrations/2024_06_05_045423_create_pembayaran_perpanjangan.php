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
        Schema::create('pembayaran_perpanjangan', function (Blueprint $table) {
            $table->id('pembayaranperpanjang_id');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_perpanjang')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_proof');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('id_perpanjang')->references('id_perpanjang')->on('perpanjang_sim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_perpanjangan');
    }
};
