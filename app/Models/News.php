<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "Title",
        "Cover_Image",
        "Content",
        "Publishing_date",
        "user_id"
     ];

     public function User(){
       return $this->belongsTo(User::class);
     }
}
