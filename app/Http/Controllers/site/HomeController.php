<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Imovel;
use App\Models\Slide;
use App\Models\Tipo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $data['imoveis'] = Imovel::where('publicar', 'sim')->orderBy('id', 'desc')->paginate(1);
        $data['slides'] = Slide::where('publicado', 'sim')->orderBy('ordem')->get();
        $data['directionImage'] = ['center-align', 'left-align', 'right-align'];

        $data['paginacao'] = true;
        $data['tipos'] = Tipo::orderBy('titulo')->get();
        $data['cidades'] = Cidade::orderBy('nome')->get();

        return view('site.home', $data);
    }

    public function busca(Request $request)
    {
        $data['busca'] = $request->all();
        $data['paginacao'] = false;

        $data['tipos'] = Tipo::orderBy('titulo')->get();
        $data['cidades'] = Cidade::orderBy('nome')->get();

        if ($data['busca']['status'] == 'todos') {
            $testeStatus = [
                ['status', '<>', null]
            ];
        } else {
            $testeStatus = [
                ['status', '=', $data['busca']['status']]
            ];
        }

        if ($data['busca']['tipo_id'] == 'todos') {
            $testeTipo = [
                ['tipo_id', '<>', null]
            ];
        } else {
            $testeTipo = [
                ['tipo_id', '=', $data['busca']['tipo_id']]
            ];
        }

        if ($data['busca']['cidade_id'] == 'todos') {
            $testeCidade = [
                ['cidade_id', '<>', null]
            ];
        } else {
            $testeCidade = [
                ['cidade_id', '=', $data['busca']['cidade_id']]
            ];
        }

        $testDomitorio = [
            ['dormitorios', '>=', 0],
            ['dormitorios', '=', 1],
            ['dormitorios', '=', 2],
            ['dormitorios', '=', 3],
            ['dormitorios', '>', 3],
        ];
        $numDormitorios = $data['busca']['dormitorios'];
        $testValor = [
            [['valor', '>=', 0]],
            [['valor', '<=', 500]],
            [['valor', '>=', 500], ['valor', '<=', 1000]],
            [['valor', '>=', 1000], ['valor', '<=', 2000]],
            [['valor', '>=', 2000], ['valor', '<=', 3000]],
            [['valor', '>=', 3000], ['valor', '<=', 4000]],
            [['valor', '>=', 4000], ['valor', '<=', 5000]],
            [['valor', '>=', 5000]],
        ];
        $numValor = $data['busca']['valor'];

        if ($data['busca']['bairro']  != '') {
            $testeBairro = [
                ['endereco', 'like', '%' . $data['busca']['bairro'] . '%']
            ];
        } else {
            $testeBairro = [
                ['endereco', '<>', null]
            ];
        }
        $data['imoveis'] = Imovel::where('publicar', 'sim')
            ->where($testeStatus)
            ->where($testeTipo)
            ->where($testeCidade)
            ->where([$testDomitorio[$numDormitorios]])
            ->where($testValor[$numValor])
            ->where($testeBairro)
            ->orderBy('id', 'desc')->get();

        return view('site.busca', $data);
    }
}
