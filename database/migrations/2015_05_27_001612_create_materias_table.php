<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materias', function(Blueprint $table)
		{
			$table->increments('id_materia');
			$table->increments('horario');
			$table->increments('dia_semana');
			$table->integer('id_Professor');

			$table->foreign('horario')->references('horario')->on('horario');
			$table->foreign('dia_semana')->references('dia_semana')->on('horario');
			$table->foreign('id_Professor')->references('id_Professor')->on('Professor');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materias');
	}

}
