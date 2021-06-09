<?php

namespace App\Http\Controllers;

use App\SiteContato;
use App\MotivoContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        //uma das formas de persistir dados no banco;

        // $contato = new SiteContato();
        // $contato->nome = $request->input('name');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato_id = $request->input('motivo_contato');
        // $contato->telefone = $request->input('telefone');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->create($request->all());

        $motivos = MotivoContato::all();

        return view('site.contato',['motivos'=>$motivos]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome'=> 'required|min:5|max:50',
            'telefone' => 'required',
            'motivo_contato_id' => 'required',
            'email' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
    }
}
