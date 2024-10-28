<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Imovel;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::all();

        return view('admin.imoveis.index', compact('imoveis'));
    }

    public function adicionar()
    {
        $data['cidades'] = Cidade::all();
        $data['tipos'] = Tipo::all();
        return view('admin.imoveis.adicionar', $data);
    }

    public function salvar(Request $request)
    {
        $imovel = new Imovel();
        $data = $request->all();
        // Atribuindo os campos corretamente
        $imovel->titulo = $data['titulo'];
        $imovel->descricao = $data['descricao'];
        $imovel->status = $data['status'];
        $imovel->endereco = $data['endereco'];
        $imovel->cep = $data['cep'];
        $imovel->valor = $data['valor'];
        $imovel->dormitorios = $data['dormitorios'];
        $imovel->detalhes = $data['detalhes'];
        $imovel->mapa = isset($data['mapa']) && trim($data['mapa']) != "" ? $data['mapa'] : null;
        $imovel->vizualizacoes = isset($data['vizualizacoes']) ? $data['vizualizacoes'] : 0;
        $imovel->publicar = $data['publicar'];

        $file = $request->file('imagem');
        if ($file) {
            $rand = rand(11111, 99999);
            $strTitle = Str::slug($data['titulo'], '_');
            $directory = "img/imoveis/{$strTitle}/";
            $ext = $file->getClientOriginalExtension();
            $fileName = "img_{$rand}.{$ext}";

            $file->move($directory, $fileName);
            $data['imagem'] = "{$directory}/{$fileName}";
        }
        $imovel->imagem = $data['imagem'];

        $imovel->tipo_id = $data['tipo_id'];
        $imovel->cidade_id = $data['cidade_id'];

        $imovel->save();


        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis.index');
    }

    public function editar(int $imovelId)
    {
        $data['imovel'] = Imovel::find($imovelId);
        $data['cidades'] = Cidade::all();
        $data['tipos'] = Tipo::all();

        return view('admin.imoveis.editar', $data);
    }

    public function atualizar(Request $request, int $imovelId)
    {
        $imovel = Imovel::find($imovelId);
        $file = $request->file('imagem');
        $data = $request->all();

        $data['mapa'] = isset($data['mapa']) && trim($data['mapa']) != "" ? $data['mapa'] : null;
        if ($file) {
            $rand = rand(11111, 99999);
            $strTitle = Str::slug($data['titulo'], '_');
            $directory = "img/imoveis/{$strTitle}/{$imovelId}/";
            $ext = $file->getClientOriginalExtension();
            $fileName = "img_{$rand}.{$ext}";

            $file->move($directory, $fileName);
            $data['imagem'] = "{$directory}/{$fileName}";
        }

        $imovel->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis.index');
    }

    public function deletar(int $imovelId)
    {
        if (Imovel::where('imovel_id', $imovelId)->count()) {
            $imoveis = Imovel::where('imovel_id', $imovelId)->get();
            $imoveisIds = $imoveis->pluck('id')->implode(', ');

            $message = "Não é possível deletar essa imovel esses imóveis ({$imoveisIds}) estão relacionados.";

            Session::flash('message', [
                'msg' => $message,
                'class' => 'red white-text'
            ]);

            return redirect()->route('admin.imoveis.index');
        }

        Imovel::find($imovelId)->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis.index');
    }
}
