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
			$table->string('nome_materia',255);
            $table->string('dia_semana',255);
			$table->string('horario',255);
			$table->integer('id_turma');
			$table->integer('id_professor')->unsigned();
			$table->foreign('dia_semana','horario','id_turma')->references('dia_semana','horario','id_turma')->on('horarios');
			$table->foreign('id_professor')->references('id_professor')->on('professors');
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
		Schema::drop('materias');
	}

}
