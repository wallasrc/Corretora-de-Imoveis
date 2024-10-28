<?php

use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\ImovelController;
use App\Http\Controllers\Admin\PaginaController as AdminPaginaController;
use App\Http\Controllers\Admin\PapelController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\ImovelController as SiteImovelController;
use App\Http\Controllers\site\PaginaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'atualizar'])->name('profile.atualizar');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index']);


Route::get('/sobre', [PaginaController::class, 'sobre'])->name('site.sobre');

Route::get('/contato', [PaginaController::class, 'contato'])->name('site.contato');
Route::post('/contato/enviar', [PaginaController::class, 'enviarContato'])->name('site.contato.enviar');

Route::get('/home', [HomeController::class, 'index'])->name('site.home');
Route::get('/imovel/{id}/{titulo?}', [SiteImovelController::class, 'index'])->name('site.imovel');

Route::get('/busca', [HomeController::class, 'busca'])->name('site.busca');

Route::get('admin/login', function () {
    return view('admin.login.index');
})->name('admin.login');

Route::post(
    '/admin/login',
    [UsuarioController::class, 'login']
)->name('admin.login');


Route::middleware('auth')->group(function () {
    Route::get('/admin/principal', function () {
        return view('admin.principal');
    })->name('admin.principal');

    Route::get(
        '/admin/login/sair',
        [UsuarioController::class, 'sair']
    )->name('admin.login.sair');

    Route::middleware('auth')->group(function () {
        Route::get(
            '/admin/usuarios',
            [UsuarioController::class, 'index']
        )->name('admin.index');
        Route::get(
            '/admin/usuarios/adicionar',
            [UsuarioController::class, 'adicionar']
        )->name('admin.usuarios.adicionar');
        Route::post(
            '/admin/usuarios/salvar',
            [UsuarioController::class, 'salvar']
        )->name('admin.usuarios.salvar');
        Route::get(
            '/admin/usuarios/editar/{id}',
            [UsuarioController::class, 'editar']
        )->name('admin.usuarios.editar');
        Route::put(
            '/admin/usuarios/atualizar/{id}',
            [UsuarioController::class, 'atualizar']
        )->name('admin.usuarios.atualizar');
        Route::get(
            '/admin/usuarios/deletar/{id}',
            [UsuarioController::class, 'deletar']
        )->name('admin.usuarios.deletar');

        Route::get(
            '/admin/usuarios/papel/{id}',
            [UsuarioController::class, 'papel']
        )->name('admin.usuarios.papel');
        Route::post(
            '/admin/usuarios/papel/salvar/{id}',
            [UsuarioController::class, 'salvarPapel']
        )->name('admin.usuarios.papel.salvar');
        Route::get(
            '/admin/usuarios/papel/remover/{id}/{papel_id}',
            [UsuarioController::class, 'removerPapel']
        )->name('admin.usuarios.papel.remover');

        Route::get(
            '/admin/paginas',
            [AdminPaginaController::class, 'index']
        )->name('admin.paginas.index');
        Route::get(
            '/admin/paginas/editar/{pageId}',
            [AdminPaginaController::class, 'editar']
        )->name('admin.paginas.editar');
        Route::put(
            '/admin/paginas/atualizar/{pageId}',

            [AdminPaginaController::class, 'atualizar']
        )->name('admin.paginas.atualizar');

        Route::get(
            '/admin/tipos',
            [TipoController::class, 'index']
        )->name('admin.tipos.index');
        Route::get(
            '/admin/tipos/adicionar',
            [TipoController::class, 'adicionar']
        )->name('admin.tipos.adicionar');
        Route::post(
            '/admin/tipos/salvar',
            [TipoController::class, 'salvar']
        )->name('admin.tipos.salvar');
        Route::get(
            '/admin/tipos/editar/{id}',
            [TipoController::class, 'editar']
        )->name('admin.tipos.editar');
        Route::put(
            '/admin/tipos/atualizar/{id}',
            [TipoController::class, 'atualizar']
        )->name('admin.tipos.atualizar');
        Route::get(
            '/admin/tipos/deletar/{id}',
            [TipoController::class, 'deletar']
        )->name('admin.tipos.deletar');


        Route::get(
            '/admin/cidades',
            [CidadeController::class, 'index']
        )->name('admin.cidades.index');
        Route::get(
            '/admin/cidades/adicionar',
            [CidadeController::class, 'adicionar']
        )->name('admin.cidades.adicionar');
        Route::post(
            '/admin/cidades/salvar',
            [CidadeController::class, 'salvar']
        )->name('admin.cidades.salvar');
        Route::get(
            '/admin/cidades/editar/{id}',
            [CidadeController::class, 'editar']
        )->name('admin.cidades.editar');
        Route::put(
            '/admin/cidades/atualizar/{id}',
            [CidadeController::class, 'atualizar']
        )->name('admin.cidades.atualizar');
        Route::get(
            '/admin/cidades/deletar/{id}',
            [CidadeController::class, 'deletar']
        )->name('admin.cidades.deletar');

        Route::get(
            '/admin/imoveis',
            [ImovelController::class, 'index']
        )->name('admin.imoveis.index');
        Route::get(
            '/admin/imoveis/adicionar',
            [ImovelController::class, 'adicionar']
        )->name('admin.imoveis.adicionar');
        Route::post(
            '/admin/imoveis/salvar',
            [ImovelController::class, 'salvar']
        )->name('admin.imoveis.salvar');
        Route::get(
            '/admin/imoveis/editar/{id}',
            [ImovelController::class, 'editar']
        )->name('admin.imoveis.editar');
        Route::put(
            '/admin/imoveis/atualizar/{id}',
            [ImovelController::class, 'atualizar']
        )->name('admin.imoveis.atualizar');
        Route::get(
            '/admin/imoveis/deletar/{id}',
            [ImovelController::class, 'deletar']
        )->name('admin.imoveis.deletar');

        Route::get(
            '/admin/galerias/{imovelId}',
            [GaleriaController::class, 'index']
        )->name('admin.galerias.index');
        Route::get(
            '/admin/galerias/adicionar/{imovelId}',
            [GaleriaController::class, 'adicionar']
        )->name('admin.galerias.adicionar');
        Route::post(
            '/admin/galerias/salvar/{imovelId}',
            [GaleriaController::class, 'salvar']
        )->name('admin.galerias.salvar');
        Route::get(
            '/admin/galerias/editar/{id}',
            [GaleriaController::class, 'editar']
        )->name('admin.galerias.editar');
        Route::put(
            '/admin/galerias/atualizar/{id}',
            [GaleriaController::class, 'atualizar']
        )->name('admin.galerias.atualizar');
        Route::get(
            '/admin/galerias/deletar/{id}',
            [GaleriaController::class, 'deletar']
        )->name('admin.galerias.deletar');

        Route::get(
            '/admin/slides',
            [SlideController::class, 'index']
        )->name('admin.slides.index');
        Route::get(
            '/admin/slides/adicionar',
            [SlideController::class, 'adicionar']
        )->name('admin.slides.adicionar');
        Route::post(
            '/admin/slides/salvar',
            [SlideController::class, 'salvar']
        )->name('admin.slides.salvar');
        Route::get(
            '/admin/slides/editar/{id}',
            [SlideController::class, 'editar']
        )->name('admin.slides.editar');
        Route::put(
            '/admin/slides/atualizar/{id}',
            [SlideController::class, 'atualizar']
        )->name('admin.slides.atualizar');
        Route::get(
            '/admin/slides/deletar/{id}',
            [SlideController::class, 'deletar']
        )->name('admin.slides.deletar');

        Route::get(
            '/admin/papel',
            [PapelController::class, 'index']
        )->name('admin.papel.index');
        Route::get(
            '/admin/papel/adicionar',
            [PapelController::class, 'adicionar']
        )->name('admin.papel.adicionar');
        Route::post(
            '/admin/papel/salvar',
            [PapelController::class, 'salvar']
        )->name('admin.papel.salvar');
        Route::get(
            '/admin/papel/editar/{id}',
            [PapelController::class, 'editar']
        )->name('admin.papel.editar');
        Route::put(
            '/admin/papel/atualizar/{id}',
            [PapelController::class, 'atualizar']
        )->name('admin.papel.atualizar');
        Route::get(
            '/admin/papel/deletar/{id}',
            [PapelController::class, 'deletar']
        )->name('admin.papel.deletar');

        Route::get(
            '/admin/papel/permissao',
            [PapelController::class, 'permissao']
        )->name('admin.papel.permissao');

        Route::post(
            '/admin/papel/permissao/{id}/salvar',
            [PapelController::class, 'salvar']
        )->name('admin.papel.salvarPermissao');

        Route::get(
            '/admin/papel/permissao/{id}/remover/{id_permissao}',
            [PapelController::class, 'remover']
        )->name('admin.papel.removerPermissao');

        Route::get(
            '/admin/papel/papel/permissao/{id}',
            [PapelController::class, 'permissao']
        )->name('admin.papel.permissao');
        Route::post(
            '/admin/papel/papel/permissao/salvar/{id}',
            [PapelController::class, 'salvarPermissao']
        )->name('admin.papel.permissao.salvar');
        Route::get(
            '/admin/papel/papel/permissao/remover/{id}/{id_permissao}',
            [PapelController::class, 'removerPermissao']
        )->name('admin.papel.permissao.remover');
    });
});
