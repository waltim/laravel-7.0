<h3>Fornecedor</h3>

@php
    // if(){

    // }elseif(){

    // }else{

    // }

    // na sintaxe do blade não se usa ";"
@endphp

{{-- @dd($fornecedores) --}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existe alguns fornecedores cadastrados.</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados.</h3>
@else
    <h3>Não existem fornecedores cadastrados.</h3>
@endif --}}

{{--@unless é um atalho para if, mas que executa se o resultado da condição for FALSE. Ou seja, negação da condição dentro do if.--}}

{{-- @unless (count($fornecedores) < 10)
    <h3>Existe alguns fornecedores cadastrados.</h3>
@endunless --}}

{{--@isset é usado para testar se uma varivél, indice de array foram declarados.--}}

{{--@empty é usado para testar se uma varivél é vazia.--}}

{{-- @isset($fornecedores)
    <h3>A variável foi declarada.</h3>
@endisset --}}

@isset($fornecedores)

{{-- @for ($i = ;isset($fornecedores[$i]); $i++) utilizando um for tradicional, basta dar isset passando o $i identificador como chave.
@endfor --}}

@foreach ($fornecedores as $fornecedor)

    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    Cnpj: {{ $fornecedor['cnpj'] }}
    <br>
    Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
    <br>
    Cidade: 
    @switch($fornecedor['ddd'])
        @case(11)
            São Paulo - SP
            @break
        @case(32)
            Juiz de Fora - MG
            @break
        @case(85)
            Fortaleza - CE
            @break
        @default
            Não identificado.
    @endswitch
    <br><br><br>
@endforeach
@endisset
