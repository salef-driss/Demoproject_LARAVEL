<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinkelkarBier extends Model
{
    use HasFactory;
    protected $table = 'winkelkar_bier'; // Zorg ervoor dat dit de naam van je pivot-tabel is
    protected $fillable = [
        'winkelkar_id', 'bier_id', 'quantity',
    ];

    public function winkelkar()
    {
        return $this->belongsTo(Winkelkar::class);
    }

    public function bier()
    {
        return $this->belongsTo(Bier::class);
    }
}
