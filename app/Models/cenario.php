<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cenario extends Model
{
    use HasFactory;

    public function historicos(){

        return $this->hasOne(Historico::class);
    }

    public function investimentos(){

        return $this->belongsTo(Investimento::class);

    }
}
