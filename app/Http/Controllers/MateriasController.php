<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materia;
use App\Professor;
use App\Horario;
use Input, Redirect,Response;

class MateriasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct() { $this->middleware('auth'); } //Se o usuário não estiver logado, redireciona para a página de login

	public function index()
	{
		$materias = Materia::all();
		return view('materia.index',compact('materias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$professores = Professor::lists('nome', 'id_professor');
		$horario = Horario::lists('horario', 'id_horario');
		return view('materia.create', compact('professores','horario'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$materia = Materia::create(Input::all());
		return Redirect::route('materias_r.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Redirect::route('materias_r.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail();
		$professores = Professor::lists('nome','id_professor');
		return View('materias_r.edit')->with('materia', $materia)->with(compact('professores'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail(); //a consulta para encontrar a turma a ser alterada
		$materia->id_horario=Input::get('id_horario');//atualiza o dia da tabela horario com os valores vindos do formulário de edição
		$materia->dia_semana=Input::get('dia_semana');//atualiza o horario da tabela horario com os valores vindos do formulário de edição
		$materia->horario=Input::get('horario');//atualiza a turma  da tabela horario com os valores vindos do formulário de edição
		$materia->id_professor=Input::get('id_professor');
		$horario->save();
		return Redirect::route('materias_r.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$materia = Materia::where('id_materia', $id)->firstOrFail();
		return Redirect::route('materias_r.index');
	}

}
