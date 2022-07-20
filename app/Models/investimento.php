<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investimento extends Model
{
    use HasFactory;

    public function cenarios(){

        return $this->hasOne(Cenario::class);
    }
}
