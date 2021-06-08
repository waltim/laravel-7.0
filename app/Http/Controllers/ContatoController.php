<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        // $contato = new SiteContato();
        // $contato->nome = $request->input('name');
        // $contato->email = $request->input('email');
        // $contato->motivo = $request->input('motivo_contato');
        // $contato->telefone = $request->input('telefone');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->create($request->all());
        return view('site.contato');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome'=> 'required',
            'telefone' => 'required',
            'motivo' => 'required',
            'email' => 'required',
            'mensagem' => 'required'
        ]);
    }
}
