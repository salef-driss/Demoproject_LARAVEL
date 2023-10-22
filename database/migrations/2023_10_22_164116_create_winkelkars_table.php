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
        Schema::create('winkelkars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('aantal');
            $table->decimal('totaalprijs', 8, 2);
            $table->timestamps();

        });

        Schema::create('winkelkar_bier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('winkelkar_id')->constrained()->onDelete('cascade');
            $table->foreignId('bier_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winkelkars');
        Schema::dropIfExists('winkelkar_bier');
    }


};
