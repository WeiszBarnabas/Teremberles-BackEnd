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
        Schema::table('forms', function (Blueprint $table) {

            $table->string('torzskonyvi_nyil_szam')->nullable();
            $table->string('targyegy')->nullable();
            $table->string('targyketto')->nullable();
            $table->string('targyharom')->nullable();
            $table->string('meghatarozas')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('torzskonyvi_nyil_szam');
            $table->dropColumn('targyegy');
            $table->dropColumn('targyketto');
            $table->dropColumn('targyharom');
            $table->dropColumn('meghatarozas');

        });
    }
};
