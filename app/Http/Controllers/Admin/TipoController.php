<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();

        return view('admin.tipos.index', compact('tipos'));
    }

    public function adicionar()
    {
        return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request)
    {
        $tipo = new Tipo();
        $data = $request->all();
        $tipo->titulo = $data['titulo'];

        $tipo->save();


        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos.index');
    }

    public function editar(int $tipoId)
    {
        $tipo = Tipo::find($tipoId);

        return view('admin.tipos.editar', compact('tipo'));
    }

    public function atualizar(Request $request, int $tipoId)
    {
        $tipo = Tipo::find($tipoId);

        $data = $request->all();

        $tipo->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos.index');
    }

    public function deletar(int $tipoId)
    {
        if (Imovel::where('tipo_id', $tipoId)->count()) {
            $imoveis = Imovel::where('tipo_id', $tipoId)->get();
            $imoveisIds = $imoveis->pluck('id')->implode(', ');

            $message = "Não é possível deletar esse tipo esses imóveis ({$imoveisIds}) estão relacionados.";

            Session::flash('message', [
                'msg' => $message,
                'class' => 'red white-text'
            ]);

            return redirect()->route('admin.tipos.index');
        }

        Tipo::find($tipoId)->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos.index');
    }
}
