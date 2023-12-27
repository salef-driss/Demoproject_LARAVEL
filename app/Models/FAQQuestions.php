<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQQuestions extends Model
{
    use HasFactory;

    protected $table = 'faq_questions';

    protected $fillable = [
        "question_Title",
        "question_content",
        "FaQCategorie_id"
     ];

    public function FAQCategorie(){
            return $this->belongsTo(FAQCategorie::class);
        }
}
