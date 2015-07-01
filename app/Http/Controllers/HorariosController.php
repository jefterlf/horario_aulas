<?php namespace App\Http\Controllers;

/*testanto */

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Horario;
use App\Turma;
use Validator, Input, Redirect,Response, Session;

class HorariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() { $this->middleware('auth'); } //Se o usuário não estiver logado, redireciona para a página de login

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
	public function store(Request $request)
	{
		$messages = [
    		'required' => 'O :attribute é obrigatorio', //Mensagem de erro caso tenha algum
		];

		//define os campos obrigatórios
		$rules = array(
	
			'dia_semana'      => 'required',
			'horario'          => 'required',
			'id_turma'        => 'required'
		);

		  $validator = Validator::make($request->all(), $rules, $messages); //Executa a validação, passando os campos a serem validados e a mensagem de erro


		//se ouver erros na validação retorna para a view crete
		if ($validator->fails()) {
			   return redirect()->back()->withErrors($validator->errors());
		} else {
			//se os campos forem validos salva no banco
			$horario = Horario::create($request->all());
			// salva a mensagem na sessin para ser exibida na index
			Session::flash('message', 'Horario Cadastrado com sucesso!');
		}
		return Redirect::route('horarios_r.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($model)
	{
		
		$value = explode (",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterada
		$turmas = Turma::lists('serie', 'id_turma');//Faz a consulta para carregar o dropdowlist de bimestres
		return View('horario.delete')->with('horario', $horario)->with(compact('turmas'));//retorna $urma e $bimestres para a view
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();
		$turmas = Turma::lists('serie','id_turma');//Faz a consulta para carregar o dropdowlist de bimestres
		return View('horario.edit')->with('horario', $horario)->with(compact('turmas'));//retorna $urma e $bimestres para a view
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();//a consulta para encontrar a turma a ser alterada
		$horario->dia_semana=Input::get('dia_semana');//atualiza o dia da tabela horario com os valores vindos do formulário de edição
		$horario->horario=Input::get('horario');//atualiza o horario da tabela horario com os valores vindos do formulário de edição
		$horario->id_turma=Input::get('id_turma');//atualiza a turma  da tabela horario com os valores vindos do formulário de edição
		$horario->save();
		return Redirect::route('horarios_r.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana',$value[0])->where('horario',$value[1])->where('id_turma',$value[2])->delete();
		return Redirect::route('horarios_r.index');
	}

}