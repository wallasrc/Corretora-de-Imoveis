<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaginaController extends Controller
{
  public function index()
  {
    $pages = Pagina::all();

    return view('admin.paginas.index', compact('pages'));
  }

  public function editar(int $pageId)
  {
    $pagina = Pagina::find($pageId);
    return view('admin.paginas.editar', compact('pagina'));
  }
  public function atualizar(Request $request, int $pageId)
  {
    $data = $request->all();
    $page = Pagina::find($pageId);
    $page->titulo = trim($data['titulo']);
    $page->titulo = trim($data['descricao']);
    $page->titulo = trim($data['texto']);
    if (isset($data['email'])) {
      $page->email = trim($data['email']);
    }
    if (isset($data['mapa']) && trim($data['mapa'] != '')) {
      $page->mapa = trim($data['mapa']);
    } else {
      $page->mapa = null;
    }

    $file = $request->file('imagem');
    if ($file) {
      $rand = rand(11111, 99999);
      $directory = "img/paginas/{$pageId}/";
      $ext = $file->getClientOriginalExtension();
      $fileName = "img_{$rand}.{$ext}";

      $file->move($directory, $fileName);
      $page->imagem = "{$directory}/{$fileName}";
    }

    $page->update();

    Session::flash('message', [
      'msg' => 'Registro atualizado com sucesso.',
      'class' => 'green white-text'
    ]);
    return redirect()->route('admin.paginas.index');
  }
}
