<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\WinkelkarBier;
use App\Models\Bier;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Winkelkar extends Model
{
    use HasFactory;
    protected $fillable = [
        // Eventuele velden die je wilt opslaan in de winkelkar
        "user_id",
        "aantal",
        "totaalprijs"
    ];

    public function winkelkar_bieren()
    {
        return $this->belongsToMany(Bier::class, 'winkelkar_bier', 'winkelkar_id', 'bier_id')
        ->withPivot('quantity'); // Include the 'quantity' column    }
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
