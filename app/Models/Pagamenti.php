<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Affittuario;

class Pagamenti extends Model
{
    protected $table = 'pagamenti';
    public function affittuario()
    {
        return $this->belongsTo(Affittuario::class);
    }
    use HasFactory;
}
