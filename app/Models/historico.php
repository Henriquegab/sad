<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historico extends Model
{
    use HasFactory;

    protected $fillable = ['ambiente', 'investimentos', 'cenarios', 'maximax', 'maximin', 'maiores_tabela', 'vme'];

    public function cenarios(){

        return $this->belongsTo(Cenario::class);

    }



}
