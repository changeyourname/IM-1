<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmPermissao extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_permissao', function(Blueprint $table)
		{
			//
            $table->integer("id_adm_usuario");
            $table->integer("id_adm_modulo");
            $table->integer("visualizar")->nullable()->default(0);
            $table->integer("inserir")->nullable()->default(0);
            $table->integer("editar")->nullable()->default(0);
            $table->integer("excluir")->nullable()->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tb_adm_permissao', function(Blueprint $table)
		{
			//
		});
	}

}
