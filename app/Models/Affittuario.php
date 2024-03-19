<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
use App\Models\Pagamenti;

class Affittuario extends Model
{
    //visto che non rispettiamo la convenzione dei nomi diciamo a quela table ci riferiamo
    protected $table = 'affittuari';

    protected $guarded = [];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
    public function pagamento()
    {
        return $this->hasOne(Pagamenti::class);
    }

    use HasFactory;
}
