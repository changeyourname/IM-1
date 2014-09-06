<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmSecretaria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_secretaria', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_secretaria");
            $table->string("nome",255);
            $table->string("sigla",10)->nullable();
            $table->string("cep",20)->nullable();
            $table->string("uf",2)->nullable();
            $table->string("cidade",255)->nullable();
            $table->string("bairro",255)->nullable();
            $table->string("logradouro",255)->nullable();
            $table->string("numero",100)->nullable();
            $table->string("complemento",255)->nullable();
            $table->string("lat",255)->nullable();
            $table->string("lng",255)->nullable();
            $table->integer("ativo")->nullable()->default(0);
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tb_secretaria', function(Blueprint $table)
		{
			//
		});
	}

}
