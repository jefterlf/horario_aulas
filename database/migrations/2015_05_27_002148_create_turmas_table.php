<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turmas', function(Blueprint $table)
		{
			$table->increments('id_Turma');
			$table->foreign('Bimestre_id_bimeste')->references('id_bimestre')->on('Bimestre');
            $table->string('serie',100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('turmas');
	}

}
