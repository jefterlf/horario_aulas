<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Horario;
use App\Turma;
use Input, Redirect,Response;

class HorariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$horarios = Horario::all();
		return view('horario.index',compact('horarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$turmas = Turma::lists('serie', 'id_turma');
		return view('horario.create', compact('turmas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$horario = Horario::create(Input::all());
		return Redirect::route('horarios_r.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$horario = Horario::where('dia_semana', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  o horario a ser alterada
		$horario = Horario::lists('dia_semana','horario','id_turma');//Faz a consulta para carregar o dropdowlist de bimestres
		return View('horario.edit')->with('horario', $horario)->with(compact('horarios'));//retorna $urma e $bimestres para a view
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$horario = Horario::where('dia_semana', 1)->firstOrFail(); //a consulta para encontrar a turma a ser alterada
		$horario->dia_semana=Input::get('dia_semana');//atualiza o dia da tabela horario com os valores vindos do formulário de edição
		$horario->horario=Input::get('horario');//atualiza o horario da tabela horario com os valores vindos do formulário de edição
		$horario->id_turma=Input::get('id_turma');//atualiza a turma  da tabela horario com os valores vindos do formulário de edição
		$turma->save();
		return Redirect::route('horarios_r.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$horario = Horario::where('dia_semana', 1)->firstOrFail();
		return Redirect::route('horarios_r.index');
	}

}