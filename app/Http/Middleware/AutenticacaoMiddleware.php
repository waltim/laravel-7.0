<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {

        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuário e senha do '.$perfil.'<br>';
        }elseif($metodo_autenticacao == 'ldap'){
            echo 'verificar usuário e senha no AD do '.$perfil.'<br>';
        }
        if (false) {
            return $next($request);
        } else {
            return Response('Acesso negado! A rota exige autenticação.');
        }
    }
}
