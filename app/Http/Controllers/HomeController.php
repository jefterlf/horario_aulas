<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use App\Horario;
use App\Bimestre;
use App\Professor;
use App\Materia;
use Validator, Input, Redirect,Response, Session;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$turma = Turma::lists('serie', 'id_turma');
		return view('home')->with(compact('turma'));
	}




	public function store(Request $request)
	{
		$turma = Turma::lists('serie', 'id_turma');
		$consulta = Turma::where('id_turma', $request->id_turma)->first();		 
		$horario = Horario::where('id_turma', $request->id_turma)->groupBy('horario')->orderBy('dia_semana', 'ASC')->orderBy('horario', 'ASC')->get();
	    return view('home')->with('horario', $horario)->with(compact('turma', 'consulta'));
	}

}
