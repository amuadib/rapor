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
        Schema::create('nilai_pelajaran_rombel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelajaran_rombel_id')->constrained('pelajaran_rombel');
            $table->foreignId('santri_id')->constrained('santri');
            $table->string('nilai', 4)
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pelajaran_rombel');
    }
};
