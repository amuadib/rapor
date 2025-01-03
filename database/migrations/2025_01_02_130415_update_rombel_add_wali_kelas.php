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
        Schema::table('rombel', function (Blueprint $table) {
            $table->uuid('ustadz_id')
                ->nullable();
            $table->foreign('ustadz_id')
                ->references('id')
                ->on('ustadz')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rombel', function (Blueprint $table) {
            $table->dropForeign(['ustadz_id']);
            $table->dropColumn(['ustadz_id']);
        });
    }
};
