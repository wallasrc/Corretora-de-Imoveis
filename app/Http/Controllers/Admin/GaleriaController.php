<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GaleriaController extends Controller
{
    public function index(int $galeriaId)
    {
        $data['imovel'] = Imovel::find($galeriaId);
        $data['galerias'] = $data['imovel']->galerias()->orderBy('ordem')->get();

        return view('admin.galerias.index', $data);
    }

    public function adicionar(int $galeriaId)
    {
        $data['imovel'] = Imovel::find($galeriaId);
        return view('admin.galerias.adicionar', $data);
    }

    public function salvar(Request $request, int $imovelid)
    {
        $data['imovel'] = Imovel::find($imovelid);

        if ($data['imovel']->galerias()->count()) {
            $galeria = $data['imovel']->galerias()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        } else {
            $ordemAtual = 0;
        }

        $data += $request->all();

        if ($request->hasFile('imagem')) {
            $files = $request->file('imagem');

            foreach ($files as $file) {
                $rand = rand(11111, 99999);

                $strTitle = Str::slug($data['imovel']->titulo, '_');
                $directory = "img/galerias/{$strTitle}/";
                $ext = $file->getClientOriginalExtension();
                $fileName = "img_{$rand}.{$ext}";

                $file->move($directory, $fileName);
                $data['imagem'] = "{$directory}/{$fileName}";

                $galeria = new Galeria();
                $galeria->imovel_id = $data['imovel']->id;
                $galeria->imagem = $data['imagem'];
                $galeria->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $galeria->save();
            }
        }

        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.galerias.index', $data['imovel']->id);
    }

    public function editar(int $galeriaId)
    {
        $data['galeria'] = Galeria::find($galeriaId);
        $data['imovel'] = $data['galeria']->imovel()->first();


        return view('admin.galerias.editar', $data);
    }

    public function atualizar(Request $request, int $galeriaId)
    {
        $galeria = Galeria::find($galeriaId);
        $data['imovel'] = $galeria->imovel()->first();
        $file = $request->file('imagem');
        $data += $request->all();

        if ($file) {
            
            $rand = rand(11111, 99999);
            $strTitle = Str::slug($data['imovel']->id, '_');
            $directory = "img/galerias/{$strTitle}/{$galeriaId}/";
            $ext = $file->getClientOriginalExtension();
            $fileName = "img_{$rand}.{$ext}";

            $file->move($directory, $fileName);
            $data['imagem'] = "{$directory}/{$fileName}";
        }

        $galeria->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.galerias.index', $data['imovel']->id);
    }

    public function deletar(int $galeriaId)
    {
        $galeria = Galeria::find($galeriaId);
        $imovel = $galeria->imovel;

        $galeria->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.galerias.index', $imovel->id);
    }
}
