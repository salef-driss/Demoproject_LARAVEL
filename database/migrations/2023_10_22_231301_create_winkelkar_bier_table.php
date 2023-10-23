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
        Schema::dropIfExists('winkelkar_bier');

        Schema::create('winkelkar_bier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('winkelkar_id');
            $table->unsignedBigInteger('bier_id');
            $table->integer('quantity')->default(0); // Standaardwaarde is 0
            $table->timestamps();

            $table->foreign('winkelkar_id')->references('id')->on('winkelkars')->onDelete('cascade');
            $table->foreign('bier_id')->references('id')->on('biers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winkelkar_bier');
    }
};
