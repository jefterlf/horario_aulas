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
			$table->integer('id_horario')->unsigned();
            $table->integer('dia_semana')->unsigned();
			$table->integer('horario')->unsigned();
			$table->integer('id_professor')->unsigned();

			$table->foreign('id_horario')->references('id_horario')->on('horarios');
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
