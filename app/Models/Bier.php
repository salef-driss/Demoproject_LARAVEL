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

    public function winkelkarBieren()
    {
        return $this->belongsToMany(Winkelkar::class, 'winkelkar_bier', 'bier_id', 'winkelkar_id')
            ->withPivot("id",'quantity' ,0);
    }

}
