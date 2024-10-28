<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::all();

        return view('admin.cidades.index', compact('cidades'));
    }

    public function adicionar()
    {
        return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request)
    {
        $cidade = new Cidade();
        $data = $request->all();
        $cidade->nome = $data['nome'];
        $cidade->estado = $data['estado'];
        $cidade->sigla_estado = $data['sigla_estado'];

        $cidade->save();


        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades.index');
    }

    public function editar(int $cidadeId)
    {
        $cidade = Cidade::find($cidadeId);

        return view('admin.cidades.editar', compact('cidade'));
    }

    public function atualizar(Request $request, int $cidadeId)
    {
        $cidade = Cidade::find($cidadeId);

        $data = $request->all();

        $cidade->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades.index');
    }

    public function deletar(int $cidadeId)
    {
        if (Imovel::where('cidade_id', $cidadeId)->count()) {
            $imoveis = Imovel::where('cidade_id', $cidadeId)->get();
            $imoveisIds = $imoveis->pluck('id')->implode(', ');

            $message = "Não é possível deletar essa cidade esses imóveis ({$imoveisIds}) estão relacionados.";

            Session::flash('message', [
                'msg' => $message,
                'class' => 'red white-text'
            ]);

            return redirect()->route('admin.cidades.index');
        }

        Cidade::find($cidadeId)->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades.index');
    }
}
