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
		$horario = Horario::lists('horario','horario');
        $horario1 = Horario::lists('dia_semana','dia_semana');
        $horario2 = Turma::lists('serie','id_turma');
		return view('materia.create', compact('professores','horario', 'horario1','horario2'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$messages = [
    		'required' => 'O :attribute é obrigatorio', //Mensagem de erro caso tenha algum
    	];

    	//define os campos obrigatórios
		$rules = array(
			'nome_materia'       => 'required',
			'dia_semana'      => 'required',
			'horario'      => 'required',
			'id_turma'      => 'required',
			'id_professor'      => 'required'
		);
		  $validator = Validator::make($request->all(), $rules, $messages); //Executa a validação, passando os campos a serem validados e a mensagem de erro


		  //se ouver erros na validação retorna para a view crete
		if ($validator->fails()) {
			   return redirect()->back()->withErrors($validator->errors());
		} else {
			//se os campos forem validos salva no banco
			$materia = Materia::create($request->all());
			// salva a mensagem na sessin para ser exibida na index
			Session::flash('message', 'Materia Cadastrado com sucesso!');
		}
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
		$materia = Materia::where('id_materia', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterada
		$professores = Professor::lists('nome', 'id_professor');//Faz a consulta para carregar o dropdowlist de bimestres
		$horario = Horario::lists('horario', 'id_horario');
		return View('materia.delete')->with('materia', $materia)->with(compact('professores','horario'));//retorna $urma e $bimestres para a view
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
		$horarios = Horario::lists('horario','id_horario');
		return View('materia.edit')->with('materia', $materia)->with(compact('professores','horarios'));
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
		$materia->nome_materia=Input::get('nome_materia');
		$materia->id_horario=Input::get('id_horario');//atualiza o dia da tabela horario com os valores vindos do formulário de edição
		$materia->dia_semana=Input::get('dia_semana');//atualiza o horario da tabela horario com os valores vindos do formulário de edição
		$materia->horario=Input::get('horario');//atualiza a turma  da tabela horario com os valores vindos do formulário de edição
		$materia->id_professor=Input::get('id_professor');
		$materia->save();
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
		Materia::destroy($id);
		return Redirect::route('materias_r.index');
	}

}
