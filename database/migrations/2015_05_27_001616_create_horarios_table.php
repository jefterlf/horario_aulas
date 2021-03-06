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
			
			$table->string('dia_semana',255);
			$table->string('horario',255);
			$table->integer('id_turma')->unsigned();
			$table->primary(['dia_semana','horario','id_turma']);
			$table->foreign('id_turma')->references('id_turma')->on('turmas');
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
		Schema::drop('horarios');
	}

}
