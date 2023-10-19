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
        Schema::create('biers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("naam");
            $table->float("prijs");
            $table->string("bierimage");
            $table->integer("stok");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biers');
    }
};
