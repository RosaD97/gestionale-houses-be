<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Affittuario;

class House extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function affittuario(){
        return $this->hasOne(Affittuario::class);
    }

    use HasFactory;

    // aggiorna tutto tranne slug
    protected $guarded = ['slug', 'img'];
}
