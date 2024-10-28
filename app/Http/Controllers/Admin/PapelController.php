<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Papel;
use App\Models\Permisao;
use App\Models\Permissao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PapelController extends Controller
{
    public function index()
    {
        $data['papeis'] = Papel::all();

        return view('admin.papel.index', $data);
    }

    public function adicionar(): View
    {
        return view('admin.papel.adicionar');
    }

    public function salvar(Request $request): RedirectResponse
    {
        Papel::create($request->all());

        return redirect()->route('admin.papel.index');
    }

    public function editar(int $id): View
    {
        if (Papel::find($id)->nome === 'admin') {
            return redirect()->route('admin.papel.index');
        }
        $papel = Papel::find($id);
        return view('admin.papel.editar', compact('papel'));
    }

    public function atualizar(Request $request, int $id): RedirectResponse
    {
        if (Papel::find($id)->nome === 'admin') {
            return redirect()->route('admin.papel.index');
        }

        Papel::find($id)->update($request->all());

        return redirect()->route('admin.papel.index');
    }

    public function deletar(int $id): View|RedirectResponse
    {
        if (Papel::find($id)->nome === 'admin') {
            return redirect()->route('admin.papel.index');
        }

        Papel::find($id)->delete();

        return redirect()->route('admin.papel.index');
    }

    public function permissao(int $id)
    {
        $data['papel'] = Papel::find($id);
        $data['permissoes'] = Permissao::all();

        return view('admin.papel.permissao', $data);
    }

    public function savarPermissao(Request $request, int $id)
    {
        $papel = Papel::find($id);
        $permissao = permissao::find($request->permissao_id);

        $papel->adicionarPermissao($permissao);

        return redirect()->back();
    }

    public function removerPermissao(int $id, int $id_permissao)
    {
        $papel = Papel::find($id);
        $permissao = permissao::find($id_permissao);

        $papel->removerPermissao($permissao);

        return redirect()->back();
    }
}
