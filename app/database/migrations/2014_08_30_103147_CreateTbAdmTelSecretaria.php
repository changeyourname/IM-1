<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmTelSecretaria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_tel_secretaria', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_tel_secretaria");
            $table->integer("id_adm_secretaria");
            $table->string("telefone",20)->nullable();
            $table->string("local",100)->nullable();
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
		Schema::table('tb_tel_secretaria', function(Blueprint $table)
		{
			//
		});
	}

}
