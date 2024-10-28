<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Papel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
$user = Auth::user();
        if ($user->can('usuario-listar', false)) {
            $usuarios = User::all();
            return view('admin.usuarios.indes', compact('usuarios'));
        } else {
            return redirect()->route('admin.principal');
        }


        $data = $request->all();
        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ])) {
            Session::flash('message', [
                'msg' => 'Login realizado com sucesso',
                'class' => 'green white-text'
            ]);
            return redirect()->route('admin.principal');
        }
        Session::flash('message', [
            'msg' => 'Erro! Confira seus dados.',
            'class' => 'red white-text'
        ]);
        return redirect()->route('admin.login');
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.usuarios.index', compact('users'));
    }

    public function adicionar()
    {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        $user = new User();
        $data = $request->toArray();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        $user->save();


        Session::flash('message', [
            'msg' => 'Registro criado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.index');
    }

    public function editar(int $userId)
    {
        $usuario = User::find($userId);

        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, int $userId)
    {
        $usuario = User::find($userId);

        $data = $request->all();

        if (isset($data['password']) && strlen($data['password'] > 5)) {
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        Session::flash('message', [
            'msg' => 'Registro atualizado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.index');
    }

    public function deletar(int $userId)
    {
        User::find($userId)->delete();

        Session::flash('message', [
            'msg' => 'Registro deletado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.index');
    }

    public function papel(int $id)
    {
        $data['usuario'] = User::find($id);
        $data['papeis'] = Papel::all();

        return view('admin.usuarios.papel', $data);
    }

    public function salvarPapel(Request $request, int $id)
    {
        $usuario = User::find($id);
        $papel = Papel::find($request->papel_id);
        $usuario->adicionaPapel($papel);

        return redirect()->back();
    }

    public function removerPapel(int $id, int $papel_id)
    {
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removerPapel($papel);

        return redirect()->back();
    }
}
