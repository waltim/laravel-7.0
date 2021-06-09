<?php

namespace App\Http\Controllers;
use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){

        $motivos = MotivoContato::all();

        return view('site.principal', ['titulo' => 'Página Inicial', 'motivos' => $motivos ]);
    }
}
