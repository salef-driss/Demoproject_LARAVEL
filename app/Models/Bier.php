<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Winkelkar;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bier extends Model
{
    use HasFactory;

    protected $fillable = [
        "naam",
        "prijs",
        "bierimage",
        "stok",
    ];

    public function winkelkarren()
    {
        return $this->belongsToMany(Winkelkar::class,"winkelkar_bier");
    }
}
