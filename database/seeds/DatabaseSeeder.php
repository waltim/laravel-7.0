<?php

use App\MotivoContato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(MotivoContatoSeeder::class);
        $this->call(SiteContatoSeeder::class);
    }

    // rodar o comando para executar apenas uma única classe seeder: php artisan db:seed --class=SiteContatoSeeder
}
