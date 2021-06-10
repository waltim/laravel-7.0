<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = $request->get('erro');
        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {

        $request->validate(
            [
                'username' => 'email',
                'password' => 'required'
            ],
            [
                'username.email' => 'O campo usuário (e-mail) é obrigatório.',
                'password.required' => 'A senha é obrigatória.'
            ]
        );

        $email = $request->get('username');
        $password =  $request->get('password');
        $user = User::where('email', $request->get('username'))->where('password', $password)->first();
        if ($user->count() > 0) {
            // dd($user);
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // dd($request->all());

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
