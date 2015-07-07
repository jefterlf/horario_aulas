<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materia;
use App\Professor;
use App\Horario;
use App\Turma;
use Validator, Input, Redirect,Response, Session;

class MateriasController extends Controller {


	public function __construct() { $this->middleware('auth'); }

	public function index()
	{
		$materias = Materia::all();
		return view('materia.index',compact('materias'));
	}

	public function create()
	{
		$professores = Professor::lists('nome', 'id_professor');
		$horario = Horario::lists('horario','horario');
        $dia_semana = Horario::lists('dia_semana','dia_semana');
        $turma = Turma::lists('serie','id_turma');
		return view('materia.create', compact('professores','horario', 'dia_semana','turma'));
	}

	public function store(Request $request)
	{
			$materia = Materia::create($request->all());
			Session::flash('message', 'Materia Cadastrado com sucesso!');
		    return Redirect::route('materias_r.index');
	}

	public function show($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail();
		$professores = Professor::lists('nome', 'id_professor');
        $turma = Turma::lists('serie', 'id_turma');
		$horario = Horario::lists('horario', 'horario');
		return View('materia.delete')->with('materia', $materia)->with(compact('professores','horario','turma'));
	}

	public function edit($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail();
		$professores = Professor::lists('nome','id_professor');
        $turma = Turma::lists('serie','id_turma');
		$horario = Horario::lists('horario','horario');
		return View('materia.edit')->with('materia', $materia)->with(compact('professores','horario','turma'));
	}

	public function update($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail();
		$materia->nome_materia=Input::get('nome_materia');
		$materia->dia_semana=Input::get('dia_semana');
        $materia->id_turma=Input::get('id_turma');
        $materia->horario=Input::get('horario');
		$materia->id_professor=Input::get('id_professor');
		$materia->save();
		return Redirect::route('materias_r.index');
	}

	public function destroy($id)
    {
        $professor = Professor::where('id_professor', $id)->count();

        if($professor > 0){
            Session::flash('delet', 'Matéria já cadastrada, não é permitido a exclusão !!!');
        }else{
            Materia::destroy($id);
            Session::flash('delet', 'Matéria excluída com sucesso !!!');
        }
        return Redirect::route('materias_r.index');
    }
}
