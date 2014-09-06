<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPrjObservacao extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('tb_prj_observacao', function(Blueprint $table)
            {
			//
            $table->increments("id_prj_obsevacao");
            $table->integer("id_prj_projeto");
            $table->integer("id_adm_usuario");
            $table->date("dt_obsercacao");
            $table->text("observacao");
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
		Schema::table('tb_prj_observacao', function(Blueprint $table)
		{
			//
		});
	}

}
