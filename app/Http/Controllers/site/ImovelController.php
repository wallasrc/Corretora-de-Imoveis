<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class ImovelController extends Controller
{
    public function index(int $id): View
    {
        $imovel = Imovel::find($id);
        $galeria = $imovel->galerias()->orderBy('ordem')->get();
        $directionImage = ['center-align', 'left-align', 'right-align'];

        $seo = [
            'titulo' => $imovel->titulo,
            'descricao' =>$imovel->descricao,
            'imagem' => asset($imovel->imagem),
            'url' => route('site.imovel',[ $imovel->id, Str::slug($imovel->titulo, '_')]),
        ];

        return view('site.imovel', compact('imovel', 'directionImage', 'galeria', 'seo'));
    }
}
