<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Fornecedor::class, 200)->create();

        // $fornecedor = new Fornecedor();
        // $fornecedor->nome  = 'Fornecedor 100';
        // $fornecedor->site  = 'fornecedor.seeder.com.br';
        // $fornecedor->uf  = 'DF';
        // $fornecedor->email  = 'fornecedor@seeder.com.br';
        // $fornecedor->save();


        //o método create (atenção para o atributo fillable da classe)
        // Fornecedor::create([
        //     'nome' => 'Fornecedor 200',
        //     'site' => 'fornecedor200.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@fornecedor200.com.br'
        // ]);

        //insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 300',
        //     'site' => 'fornecedor300.com.br',
        //     'uf' => 'SP',
        //     'email' => 'contato@fornecedor300.com.br'
        // ]); dessa forma não salva as datas em created_at e updated_at
    }
}
