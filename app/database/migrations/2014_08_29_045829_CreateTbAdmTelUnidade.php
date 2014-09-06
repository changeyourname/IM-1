<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmTelUnidade extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_tel_unidade', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_tel_unidade");
            $table->integer("id_adm_unidade");
            $table->string("numero",20);
            $table->string("descr",255);
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
		Schema::table('tb_tel_adm_unidade', function(Blueprint $table)
		{
			//
		});
	}

}
