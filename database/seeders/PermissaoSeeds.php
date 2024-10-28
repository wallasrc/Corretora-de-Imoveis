<?php

namespace Database\Seeders;

use App\Models\Permissao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Permissao::where('nome', 'usuarios_listar')->count()) {
            Permissao::create([
                'nome' => 'usuarios_listar',
                'descricao' => 'Listar Usuários',
            ]);
        } else {
            $permisao = Permissao::where('nome', 'usuarios_listar')->first();

            $permisao->update([
                'nome' => 'usuarios_listar',
                'descricao' => 'Listar Usuários',
            ]);
        }

        if (!Permissao::where('nome', 'usuarios_adicionar')->count()) {
            Permissao::create([
                'nome' => 'usuarios_adicionar',
                'descricao' => 'Adicionar Usuários',
            ]);
        } else {
            $permisao = Permissao::where('nome', 'usuarios_adicionar')->first();

            $permisao->update([
                'nome' => 'usuarios_adicionar',
                'descricao' => 'Adicionar Usuários',
            ]);
        }
    
        if (!Permissao::where('nome', 'usuarios_editar')->count()) {
            Permissao::create([
                'nome' => 'usuarios_editar',
                'descricao' => 'Editar Usuários',
            ]);
        } else {
            $permisao = Permissao::where('nome', 'usuarios_editar')->first();

            $permisao->update([
                'nome' => 'usuarios_editar',
                'descricao' => 'Editar Usuários',
            ]);
        }

        if (!Permissao::where('nome', 'usuarios_deletar')->count()) {
            Permissao::create([
                'nome' => 'usuarios_deletar',
                'descricao' => 'Deletar Usuários',
            ]);
        } else {
            $permisao = Permissao::where('nome', 'usuarios_deletar')->first();

            $permisao->update([
                'nome' => 'usuarios_deletar',
                'descricao' => 'Deletar Usuários',
            ]);
        }
    }
}
