<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

	protected $fillable = ['nome_materia','dia_semana','horario','id_turma','id_professor'];
	protected $guarded = ['created_at','updated_at'];
	protected $primaryKey = "id_materia";

	public function professor(){
			return $this->hasOne('App\Professor', 'id_professor', 'id_professor');
}

	public function horario(){
			return $this->hasOne('App\Horario', 'dia_semana', 'dia_semana');		
}

	public function turma(){
			return $this->hasOne('App\Turma', 'id_turma', 'id_turma');
		}
}