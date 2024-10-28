<?php

namespace Database\Seeders;

use App\Models\Pagina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exists = Pagina::where('tipo', 'sobre')->count();

        if ($exists) {
            $paginaSobre = Pagina::where('tipo', 'sobre')->first();
        } else {
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "A empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa.";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7965.028395638356!2d-42.363086800000005!3d-3.467459299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1729127832098!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        $paginaSobre->imagem = "img/undefined_image.png";
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();

        echo  "Página sobre criada com sucesso!\n";

        $exists = Pagina::where('tipo', 'contato')->count();

        if ($exists) {
            $paginaSobre = Pagina::where('tipo', 'contato')->first();
        } else {
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Entre em contato";
        $paginaSobre->descricao = "Preencha o formulário";
        $paginaSobre->texto = "Contato";
        $paginaSobre->imagem = "img/undefined_image.png";
        $paginaSobre->email = "wallas.rocha-castro@hotmail.com";
        $paginaSobre->tipo = "contato";
        $paginaSobre->save();

        echo  "Página contato criada com sucesso!";
    }
}
