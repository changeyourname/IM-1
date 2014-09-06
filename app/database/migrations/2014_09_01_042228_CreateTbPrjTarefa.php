<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPrjTarefa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_prj_tarefa', function(Blueprint $table)
		{
			//
            $table->increments("id_prj_tarefa");
            $table->integer("id_prj_etapa");
            $table->integer('id_adm_usuario');
            $table->integer("id_adm_secretaria");
            $table->integer("id_responsavel");
            $table->integer("id_prj_tarefa_dependente");
            $table->string("nome",255);
            $table->text("descricao");
            $table->date("dt_inicio")->nullable();
            $table->date("dt_fim")->nullable();
            $table->decimal("valor",10,2);
            $table->integer("id_status");
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
		Schema::table('tb_prj_tarefa', function(Blueprint $table)
		{
			//
		});
	}

}
