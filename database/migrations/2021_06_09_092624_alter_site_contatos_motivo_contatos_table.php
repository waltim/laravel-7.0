<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteContatosMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            DB::statement('ALTER TABLE site_contatos MODIFY motivo BIGINT(20) UNSIGNED');
            $table->renameColumn('motivo', 'motivo_contato_id');
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            DB::statement('ALTER TABLE site_contatos DROP FOREIGN KEY site_contatos_motivo_contato_id_foreign');
            DB::statement('ALTER TABLE site_contatos DROP INDEX site_contatos_motivo_contato_id_foreign');
            DB::statement('ALTER TABLE site_contatos MODIFY motivo_contato_id TINYINT(4)');
            $table->renameColumn('motivo_contato_id', 'motivo');
        });
    }
}
