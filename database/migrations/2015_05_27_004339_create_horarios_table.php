<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horarios', function(Blueprint $table)
		{
			$table->integer('dia_semana');
			$table->integer('horario');
			$table->primary('dia_semana');
			$table->primary('horario');
			$table->integer('id_Turma_fk')->unsigned();
			$table->foreign('id_Turma')->references('id_Turma')->on('Turma');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('horarios');
	}

}
