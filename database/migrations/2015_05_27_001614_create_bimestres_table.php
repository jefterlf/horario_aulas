<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimestresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bimestres', function(Blueprint $table)
		{
			$table->increments('id_bimestre');
            $table->string('bimestre', 255);
            $table->date('data_inicio');
            $table->date('data_final');
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
		Schema::drop('bimestres');
	}

}
