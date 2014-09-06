<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmTipoUnidade extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_tipo_unidade', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_tipo_unidade");
            $table->string("nome",255);
            $table->string("icone",100)->nullable();
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
		Schema::table('tb_tipo_adm_unidade', function(Blueprint $table)
		{
			//
		});
	}

}
