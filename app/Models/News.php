<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "Title",
        "Cover Image",
        "Content",
        "Publishing date",
        "user_id"
     ];

     public function User(){
       return $this->belongsTo(User::class);
     }
}
