<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model {

		protected $fillable = ['serie','id_bimestre', 'id_turma'];
		
		protected $primaryKey = "id_turma";
 
		public function bimestre(){
			return $this->hasOne('App\Bimestre', 'id_bimestre', 'id_bimestre');
		}
		public function turma(){
				return $this->hasOne('App\Turma', 'id_turma', 'id_turma');
		}
	
}

