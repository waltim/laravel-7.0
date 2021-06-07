<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '0001/0',
                'ddd' => 11,
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '0001/1',
                'ddd' => 85,
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '0001/2',
                'ddd' => 32,
                'telefone' => '0000-0000'
            ],
        ];

        // $fornecedores = \App\Fornecedor::all();

        // echo isset($fornecedores) ? "a variável fornecedores foi declarada!" : "a variável não foi declarada";

        // echo $fornecedores ?? "a variável não foi declarada"; Já aplica isset e empty ba variável.

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
