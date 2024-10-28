<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'estado',
        'sigla_estado',
    ];
    
    public function imoveis()
    {
        return $this->hasMany(Imovel::class, 'cidade_id');
    }
}
