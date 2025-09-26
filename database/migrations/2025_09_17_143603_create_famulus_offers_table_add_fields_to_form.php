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
        Schema::create('famulus_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id');
            $table->string('offer_name');
            $table->integer('duration');
            $table->integer('price_per_unit');
            $table->integer('total_price');
            $table->boolean('night');
            $table->timestamps();
        });

        Schema::table('forms', function (Blueprint $table) {
            $table->integer('famulus_offer')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('famulus_offers');

        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('famulus_offer');
        });
    }
};
