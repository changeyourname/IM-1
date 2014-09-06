<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmCargo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_cargo', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_cargo");
            $table->string("nome",255);
            $table->string("descricao",255)->nullable();
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
		Schema::table('tb_adm_cargo', function(Blueprint $table)
		{
			//
		});
	}

}
