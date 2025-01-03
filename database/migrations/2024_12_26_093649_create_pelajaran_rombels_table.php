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
        Schema::create('pelajaran_rombel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rombel_id')->constrained('rombel');
            $table->foreignId('pelajaran_id')->constrained('pelajaran');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajaran_rombel');
    }
};
