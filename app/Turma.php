<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model {

		 protected $fillable = ['serie','id_bimestre'];
		 protected $guarded = ['id_turma'];
		 public function bimestres(){
			return $this->hasMany('App\Bimestre');
	}
	
}

