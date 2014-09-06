<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_adm_usuario', function(Blueprint $table)
		{
			//
            $table->increments("id_adm_usuario");
            $table->string("img",255)->nullable();
            $table->string("nome",255);
            $table->string("email",255);
            $table->string("telefone",20)->nullable();
            $table->string("celular",20)->nullable();
            $table->date("dt_nascimento")->nullable();
            $table->string("sexo",1);
            $table->string("login",255);
            $table->string("password",255);
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
		Schema::table('tb_usuario', function(Blueprint $table)
		{
			//
		});
	}

}
