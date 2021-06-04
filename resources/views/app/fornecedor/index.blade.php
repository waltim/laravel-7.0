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

{{-- @php $i = 0 @endphp
@while ($fornecedores[$i]) while com o blade é muito feio. Parece uma gambiarra escrota.
    @php $i++ @endphp
@endwhile --}}


{{-- @forelse faz o mesmo que o @foreach, mas se o array estiver vazio, vc pode passar para uma condição @empty dentro do laço, facilitando a implementação das telas de visão para os usuários quando você não tiver itens a serem listados.--}}

@forelse($fornecedores as $indice => $fornecedor) {{-- @foreach faz uma copia do array original. Qualquer alteração deve ser feita no array original. ex: $fornecedores[$indice] = alteração que se deseja fazer. --}}
    {{-- Iteração atual (ID): {{$loop->iteration}} temos também first e last, para avaliar a primeira e ultima iteração do loop. temos também count, que retorna o total de registros iterados.
    <br> --}}
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
    <hr>
@empty
    Não existem fornecedores cadastrados!!.
@endforelse
@endisset
