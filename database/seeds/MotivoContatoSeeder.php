<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['descricao' => 'Dúvida']);
        MotivoContato::create(['descricao' => 'Elogio']);
        MotivoContato::create(['descricao' => 'Reclamação']);
    }
}
