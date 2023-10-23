<?php

namespace App\Models;
use App\Models\WinkelkarBier;

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

    // app/Models/Bier.php

public function winkelkar_bieren()
{
    return $this->hasMany(WinkelkarBier::class);
}

}
