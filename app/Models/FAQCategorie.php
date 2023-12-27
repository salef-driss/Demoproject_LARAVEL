<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategorie extends Model
{

    protected $table = 'faq_categories';

    use HasFactory;
    protected $fillable = [
        "CategorieName",
        "user_id"
     ];

     public function user(){
        return $this->belongsTo(User::class);
    }

    public function FAQQuestions(){
        return $this->hasMany(FAQQuestions::class );
    }

}
