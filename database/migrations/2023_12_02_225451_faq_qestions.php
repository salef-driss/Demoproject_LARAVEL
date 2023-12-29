<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_Title');
            $table->text('question_content');
            $table->unsignedBigInteger('FaQCategorie_id');
            $table->timestamps();

            $table->foreign('FaQCategorie_id')->references('id')->on('faq_categories')->onDelete('cascade');

            // Voeg eventuele extra kolommen toe die je nodig hebt.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_questions');
    }
};
