<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmGestorSecretaria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_gestor_secretaria', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_gestro_secretaria");
            $table->integer("id_adm_usuario");
            $table->integer("id_adm_secretaria");
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
		Schema::table('tb_gestor_secretaria', function(Blueprint $table)
		{
			//
		});
	}

}
