<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPrjEtapa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('tb_prj_etapa', function(Blueprint $table)
            {
                    //
            $table->increments("id_prj_etapa");
            $table->integer("id_adm_usuario");
            $table->string("nome",255);
            $table->text("descricao")->nullable();            
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
		Schema::table('tb_prj_etapa', function(Blueprint $table)
		{
			//
		});
	}

}
