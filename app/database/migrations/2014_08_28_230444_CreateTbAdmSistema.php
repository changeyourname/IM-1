<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmSistema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_sistema', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_sistema");
            $table->string("nome",255);
            $table->string("url",255)->nullable();
            $table->string("icone",100)->nullable();
            $table->integer("posicao")->nullable()->defaul(0);
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
		Schema::table('tb_sistema', function(Blueprint $table)
		{
			//
		});
	}

}
