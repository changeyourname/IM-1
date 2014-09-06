<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPrjProjeto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_prj_projeto', function(Blueprint $table)
		{
			//
            $table->increments("id_projeto");
            $table->integer("id_adm_usuario");
            $table->string("nome",255);       
            $table->text("descricao")->nullable();
            $table->integer("id_gerente");
            $table->date("dt_lancamento");
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
		Schema::table('tb_prj_projeto', function(Blueprint $table)
		{
			//
		});
	}

}
