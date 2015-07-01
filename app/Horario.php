<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $fillable = ['dia_semana','horario','id_turma',];
		 protected $guarded = ['created_at','updated_at'];

		 protected $primaryKey = ['dia_semana','horario','id_turma'];
		 
		 public function turma(){
			return $this->hasOne('App\Turma', 'id_turma', 'id_turma');
		}

}
