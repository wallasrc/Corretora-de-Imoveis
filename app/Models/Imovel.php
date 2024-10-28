<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = "imoveis";

    protected $fillable = [
        'tipo_id',
        'cidade_id',
        'titulo',
        'descricao',
        'imagem',
        'status',
        'endereco',
        'cep',
        'valor',
        'dormitorios',
        'detalhes',
        'mapa',
        'vizualizacoes',
        'publicar',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function galerias()
    {
        return $this->hasMany(Galeria::class, 'imovel_id');
    }
}
