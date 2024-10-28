<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PaginaController extends Controller
{
    public function sobre(): View
    {
        $pagina = Pagina::where('tipo', 'sobre')->first();

        return view('site.sobre', compact('pagina'));
    }

    public function contato(): View
    {
        $pagina  = Pagina::where('tipo', 'contato')->first();

        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
        $pagina = Pagina::where('tipo', 'contato')->first();
        $email = $pagina->email;

        Mail::send(
            'emails.contato',
            ['request' => $request],
            function ($mail) use ($request, $email) {
                $mail->from($request['email'], $request['nome']);
                $mail->subject('Contato do Site');
                $mail->to($email, 'Contato do Site');
            }
        );

        Session::flash('message', [
            'msg' => 'Contato enviado com sucesso.',
            'class' => 'green white-text'
        ]);

        return redirect()->route('site.contato');
    }
}
