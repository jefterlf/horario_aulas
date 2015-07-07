<?php namespace App\Http\Controllers;

/*testanto */

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Horario;
use App\Turma;
use Validator, Input, Redirect,Response, Session;

class HorariosController extends Controller {

	
	public function __construct() { $this->middleware('auth'); } 

	public function index()
	{
		$horarios = Horario::all();
		return view('horario.index',compact('horarios'));
	}

	
	public function create()
	{
		$turmas = Turma::lists('serie', 'id_turma');
		return view('horario.create', compact('turmas'));
	}

	
	public function store(Request $request)
	{
		$messages = [
    		'required' => 'O :attribute é obrigatorio', 
		];

		
		$rules = array(
	
			'dia_semana'      => 'required',
			'horario'          => 'required',
			'id_turma'        => 'required'
		);

		  $validator = Validator::make($request->all(), $rules, $messages); 

 		  $horario = Horario::where('dia_semana',$request->dia_semana)->where('horario', $request->horario)->count();



		if($horario > 0){
            Session::flash('message', 'Esse Horário ja foi cadastrado anteriormente, por favor tente novamente!');
            return Redirect::route('horarios_r.create');
        }elseif ($validator->fails()) {
               return redirect()->back()->withErrors($validator->errors());
        }else{

            $horario = Horario::create($request->all());			
			Session::flash('message', 'Horario Cadastrado com sucesso!');

        }
		return Redirect::route('horarios_r.index');

	}


	public function show($model)
	{
		
		$value = explode (",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();
		$turmas = Turma::lists('serie', 'id_turma');
		return View('horario.delete')->with('horario', $horario)->with(compact('turmas'));
	}

	public function edit($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();
		$turmas = Turma::lists('serie','id_turma');
		return View('horario.edit')->with('horario', $horario)->with(compact('turmas'));
	}


	public function update($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana', $value[0])->where('horario',$value[1])->where('id_turma',$value[2])->firstOrFail();
		$horario->dia_semana=Input::get('dia_semana');
		$horario->horario=Input::get('horario');
		$horario->id_turma=Input::get('id_turma');
		$horario->save();
		return Redirect::route('horarios_r.index');
	}


	public function destroy($model)
	{
		$value = explode(",",$model);
		$horario = Horario::where('dia_semana',$value[0])->where('horario',$value[1])->where('id_turma',$value[2])->delete();
		return Redirect::route('horarios_r.index');
	}

}