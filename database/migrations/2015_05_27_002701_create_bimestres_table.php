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
			$table->increments('id');
            $table->string('bimestre', 10);
            $table->date('data_inicio');
            $table->date('data_final');
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
