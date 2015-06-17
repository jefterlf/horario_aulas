<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use App\Bimestre;
use Input, Redirect,Response;


class TurmasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct() { $this->middleware('auth'); } //Se o usuário não estiver logado, redireciona para a página de login

	public function index()
	{
				
		$turmas = Turma::all();
		return view('turma.index',compact('turmas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$bimestres = Bimestre::lists('bimestre', 'id_bimestre');
		return view('turma.create', compact('bimestres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$turma = Turma::create(Input::all());
		return Redirect::route('turmas_r.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$turma = Turma::where('id_turma', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterada
		$bimestres = Bimestre::lists('bimestre', 'id_bimestre');//Faz a consulta para carregar o dropdowlist de bimestres
		return View('turma.delete')->with('turma', $turma)->with(compact('bimestres'));//retorna $urma e $bimestres para a view
	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$turma = Turma::where('id_turma', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterada
		$bimestres = Bimestre::lists('bimestre', 'id_bimestre');//Faz a consulta para carregar o dropdowlist de bimestres
		return View('turma.edit')->with('turma', $turma)->with(compact('bimestres'));//retorna $urma e $bimestres para a view
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$turma = Turma::where('id_turma', $id)->firstOrFail(); //a consulta para encontrar a turma a ser alterada
		$turma->serie       = Input::get('serie');//atualiza a seria da  da turma com os valores vindos do formulário de edição
		$turma->id_bimestre = Input::get('id_bimestre');//atualiza o bimestre  da  da turma com os valores vindos do formulário de edição
		$turma->save();
		return Redirect::route('turmas_r.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Turma::destroy($id);
		return Redirect::route('turmas_r.index');
	}
public function teste($id_turma){
return Redirect::route('turmas_r.index');	
}
}
