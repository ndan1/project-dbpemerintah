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
        Schema::create('quiz', function (Blueprint $table) {
            $table->id('question_id');
            $table->mediumText('questions');
            $table->text('opsiA');
            $table->text('opsiB');
            $table->text('opsiC');
            $table->text('opsiD');
            $table->char('answer', 1);
            $table->char('jenis_sim', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz');
    }
};
