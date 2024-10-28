<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SlideController extends Controller
{
    public function index()
    {
        $data['slides'] = Slide::orderBy('ordem')->get();

        return view('admin.slides.index', $data);
    }

    public function adicionar()
    {
        return view('admin.slides.adicionar');
    }

    public function salvar(Request $request)
    {

        if (Slide::count()) {
            $slide = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slide->ordem;
        } else {
            $ordemAtual = 0;
        }

        if ($request->hasFile('imagem')) {
            $files = $request->file('imagem');

            foreach ($files as $file) {
                $rand = rand(11111, 99999);

                $directory = "img/slide/";
                $ext = $file->getClientOriginalExtension();
                $fileName = "img_{$rand}.{$ext}";

                $file->move($directory, $fileName);
                $data['imagem'] = "{$directory}/{$fileName}";

                $slide = new slide();
       
                $slide->imagem = $data['imagem'];
                $slide->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $slide->save();
            }
        }

        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.slides.index');
    }

    public function editar(int $slideId)
    {
        $data['slide'] = Slide::find($slideId);

        return view('admin.slides.editar', $data);
    }

    public function atualizar(Request $request, int $slideId)
    {
        $slide = Slide::find($slideId);
        $data = $request->all();

        $file = $request->file('imagem');
        if ($file) {

            $rand = rand(11111, 99999);
            $directory = "img/slides";
            $ext = $file->getClientOriginalExtension();
            $fileName = "img_{$rand}.{$ext}";

            $file->move($directory, $fileName);
            $data['imagem'] = "{$directory}/{$fileName}";
        }

        $slide->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.slides.index');
    }

    public function deletar(int $slideId)
    {
        $slide = Slide::find($slideId);
        $slide->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.slides.index', $slide->id);
    }
}
