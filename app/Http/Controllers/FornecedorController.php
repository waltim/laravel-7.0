<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        // $fornecedores = [
        //     0 => [
        //         'nome' => 'Fornecedor 1',
        //         'status' => 'N',
        //         'cnpj' => '0001/0',
        //         'ddd' => 11,
        //         'telefone' => '0000-0000'
        //     ],
        //     1 => [
        //         'nome' => 'Fornecedor 2',
        //         'status' => 'S',
        //         'cnpj' => '0001/1',
        //         'ddd' => 85,
        //         'telefone' => '0000-0000'
        //     ],
        //     2 => [
        //         'nome' => 'Fornecedor 3',
        //         'status' => 'S',
        //         'cnpj' => '0001/2',
        //         'ddd' => 32,
        //         'telefone' => '0000-0000'
        //     ],
        // ];

        // $fornecedores = \App\Fornecedor::all();

        // echo isset($fornecedores) ? "a variável fornecedores foi declarada!" : "a variável não foi declarada";

        // echo $fornecedores ?? "a variável não foi declarada"; Já aplica isset e empty ba variável.

        // return view('app.fornecedores', compact('fornecedores'));

        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {

        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {

        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == null) {
            $request->validate(
                [
                    'nome' => 'required|min:3',
                    'email' => 'email',
                    'uf' => 'required|min:2|max:2',
                    'site' => 'required',
                ]
            );
            $fornecedor = Fornecedor::create($request->all());
            if ($fornecedor) {
                $msg = 'Fornecedor cadastrado com sucesso';
            } else {
                $msg = 'Erro ao cadastrar fornecedor';
            }
        } elseif ($request->input('_token') != '' && $request->input('id') != '') {
            $request->validate(
                [
                    'id' => 'required',
                    'nome' => 'required|min:3',
                    'email' => 'email',
                    'uf' => 'required|min:2|max:2',
                    'site' => 'required',
                ]
            );
            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($request->all());
            if($fornecedor){
                $msg = 'Fornecedor atualizado com sucesso';
            }else{
                $msg = 'Erro ao atualizar fornecedor';
            }
            return redirect()->route('app.fornecedores.editar',['msg' => $msg, 'id' => $request->input('id')]);
        }
        return view('app.fornecedor.adicionar',['msg' => $msg]);
    }

    public function editar(int $id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.editar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir(int $id)
    {
        $fornecedor = Fornecedor::find($id);
        if(isset($fornecedor->nome)){
            $fornecedor->delete();
        }
        return redirect()->route('app.fornecedores');
    }
}
