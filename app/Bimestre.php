<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimestre extends Model {

	 protected $fillable = ['bimestre', 'data_inicio', 'data_final'];
	 protected $guarded = ['id_bimestre'];
	
}
	