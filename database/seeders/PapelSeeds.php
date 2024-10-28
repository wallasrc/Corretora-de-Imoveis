<?php

namespace Database\Seeders;

use App\Models\Papel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapelSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Papel::where('nome', 'admin')->count()) {
            $admin = Papel::create(
                [
                    'nome' => 'admin',
                    'descricao' => 'Administrador do Sistema',
                ]
            );
        }

        if (!Papel::where('nome', 'gerente')->count()) {
            $gerente = Papel::create(
                [
                    'nome' => 'gerente',
                    'descricao' => 'Gerente do Sistema',
                ]
            );
        }

        if (!Papel::where('nome', 'vendedor')->count()) {
            $vendedor = Papel::create(
                [
                    'nome' => 'vendedor',
                    'descricao' => 'Equipe de vendas',
                ]
            );
        }
    }
}
