<?php namespace App\Http\Controllers;
use App\Turma;
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
	public function show($id)
	{
		$turma = Turma::find($id);
		return View('turma.show')->with('turma', $turma);
	}

}
