<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('winkelkar_bier');

        Schema::create('winkelkar_bier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('winkelkar_id');
            $table->unsignedBigInteger('bier_id');
            $table->integer('quantity')->default(1); // Default quantity is 1
            $table->timestamps();

            $table->foreign('winkelkar_id')->references('id')->on('winkelkars');
            $table->foreign('bier_id')->references('id')->on('biers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('winkelkar_bier');
    }
};
