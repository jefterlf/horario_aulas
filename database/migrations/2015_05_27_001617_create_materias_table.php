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
            $table->integer('dia_semana')->unsigned()->index();
			$table->integer('horario')->unsigned()->index();
			$table->integer('id_professor')->unsigned()->index();



		});
		 Schema::table('materias', function($table) {
		 	
      	 	    $table->foreign('dia_semana')->references('dia_semana')->on('horarios');
      	 	   // $table->foreign('horario')->references('horario')->on('horarios')->onDelete('cascade');;
      	 	    $table->foreign('id_professor')->references('id_professor')->on('professors');
		

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
