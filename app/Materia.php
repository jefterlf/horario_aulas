<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

	protected $fillable = ['id_materia','dia_semana','horario','id_professor'];
	protected $guarded = [];

	public function professor(){
			return $this->hasOne('App\Professor', 'id_professor', 'id_professor');
}

	public function horario(){
			return $this->hasOne('App\Horario', 'dia_semana', 'dia_semana');
			return $this->hasOne('App\Horario', 'horario', 'horario');
}

}