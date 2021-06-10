<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreController extends Controller
{
    // exemplo de como adicionar um middleware na controller
    // public function __construct()
    // {
    //     $this->middleware(LogAcessoMiddleware::class);
    //     $this->middleware('log.acesso');
    // }

    public function sobre(){
        return view('site.sobre');
    }
}
