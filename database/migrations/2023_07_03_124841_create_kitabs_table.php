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
        Schema::create('kitabs', function (Blueprint $table) {
            $table->uuid('id_kitab')->primary();
            $table->uuid('bab_id');
            $table->string('judul_kitab');
            $table->text('soal');
            $table->text('jawaban');
            $table->timestamps();
            $table->foreign('bab_id')
                ->references('id_bab')
                ->on('babs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitabs');
    }
};
