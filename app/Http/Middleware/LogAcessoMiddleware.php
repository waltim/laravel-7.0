<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request);
        // return $next($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LogAcesso::create(['log' => "O ip: $ip passou pela rota: $route."]);

        // dessa forma é possível alterar a resposta de retorno do middleware;
        $resposta = $next($request);

        return $resposta;
        // return Response('Chegamos no middleware e finalizamos aqui.');
    }
}
