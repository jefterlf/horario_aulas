<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bimestre;
use App\Turma;
use Validator, Input, Redirect,Response, Session;

class BimestreController extends Controller {

	public function __construct() { 
		$this->middleware('auth'); 
	} 

	public function index()
	{
		$bimestres = Bimestre::all();
		return view('bimestre.index', compact('bimestres'));
	}

	
	public function create()
	{
		$bimestres = Bimestre::lists('bimestre','data_inicio','data_final');
		return view('bimestre.create', compact('bimestres'));

	}
	
	public function store(Request $request){

	
		$messages = [
    		'required' => 'O :attribute é obrigatorio', 
		];

		
		$rules = array(
			'bimestre'       => 'required',
			'data_inicio'    => 'required',
			'data_final'     => 'required',
		);
		$validator = Validator::make($request->all(), $rules, $messages); 


		$bimestre = Bimestre::where('bimestre',$request->bimestre)->count();
	

		if ($bimestre > 0) {
        	Session::flash('message','Este Bimestre já está cadastrado !!!');
        	return Redirect::route('bimestres_r.create');
		}elseif ($validator->fails()) {
               return redirect()->back()->withErrors($validator->errors());
		}else{

            $bimestre = Bimestre::create(Input::all());			
			Session::flash('message', $request->bimestre.' cadastrado com sucesso !');					
	
		}
		return Redirect::route('bimestres_r.index');		
		 
	}

	
	public function show($id)
	{
		$bimestres = Bimestre::where('id_bimestre', $id)->firstOrFail();
		return View('bimestre.delete')->with('bimestre', $bimestres)->with(compact('bimestres'));
	
	}

	
	public function edit($id)
	{
        $bimestres = Bimestre::where('id_bimestre', $id)->firstOrFail();
        return View('bimestre.edit')->with('bimestre', $bimestres)->with(compact('bimestres'));

    }

	
	public function update($id, Request $request)
	{
		 $messages = [
            'required' => 'O campo :attribute é obrigatório', 
        ];

        
        $rules = array(
            'bimestre'       => 'required',
			'data_inicio'    => 'required',
			'data_final'     => 'required',                
        );
        $validator = Validator::make($request->all(), $rules, $messages); 


        
        if ($validator->fails()) {
               return redirect()->back()->withErrors($validator->errors());
        } else {

        $bimestres = Bimestre::where('id_bimestre',$id)->firstOrFail();
        $bimestres->bimestre    = Input::get('bimestre');
        $bimestres->data_inicio = Input::get('data_inicio');
        $bimestres->data_final  = Input::get('data_final');
        $bimestres->save();
        Session::flash('message', $request->bimestre.' alterado com sucesso !');
    	}
        return Redirect::route('bimestres_r.index');
	}

	

	public function destroy($id)
	{

		$turma = Turma::where('id_bimestre',$id)->count();

		if ($turma > 0) {
        	Session::flash('delet', 'Bimestre já cadastrado, não é permitido a exclusão !!!');
		} 
		else {
			Bimestre::destroy($id);
			Session::flash('delet', 'Bimestre excluído com sucesso !!!');		
		}
		return Redirect::route('bimestres_r.index');
	}
}


