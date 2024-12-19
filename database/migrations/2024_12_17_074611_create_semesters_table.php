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
        Schema::create('semester', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('singkatan')
                ->nullable();
            $table->date('tgl_awal')
                ->nullable();
            $table->date('tgl_rapor')
                ->nullable();
            $table->date('tgl_akhir')
                ->nullable();
            $table->enum('aktif', ['y', 'n'])
                ->default('n');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester');
    }
};
