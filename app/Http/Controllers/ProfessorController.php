<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Professor;
use Validator, Input, Redirect,Response, Session;

class ProfessorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function __construct() { $this->middleware('auth'); }
	public function index()
	{
		$professores = Professor::all();
        return view('professor.index', compact('professores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$professores = Professor::lists('nome', 'tipo', 'data_admissao', 'data_demissao');
        return view('professor.create', compact('professor'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        
        $messages = [
            'required' => 'O campo :attribute é obrigatório', //Mensagem de erro caso tenha algum
        ];

        //define os campos obrigatórios
        $rules = array(
            'nome'       => 'required',
            'data_admissao'      => 'required',                
        );
          $validator = Validator::make($request->all(), $rules, $messages); //Executa a validação, passando os campos a serem validados e a mensagem de erro


        //se ouver erros na validação retorna para a view crete
        if ($validator->fails()) {
               return redirect()->back()->withErrors($validator->errors());
        } else {
        $professor = Professor::create(Input::all());

        Session::flash('message', 'Professor(a) '.$request->nome.' Cadastrado com sucesso!');
        
    }return Redirect::route('professors_r.index');}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        

       $professor = Professor::where('id_professor', $id)->firstOrFail();                     
       return View('professor.delete')->with('professor', $professor)->with(compact('professor'));
      
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        $professor = Professor::where('id_professor', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterad
        return View('professor.edit')->with('professors', $professor)->with(compact('professor'));//retorna $urma e $bimestres para a view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id ,Request $request)
    {
         $messages = [
            'required' => 'O campo :attribute é obrigatório', //Mensagem de erro caso tenha algum
        ];

        //define os campos obrigatórios
        $rules = array(
            'nome'       => 'required',
            'data_admissao'      => 'required',                
        );
          $validator = Validator::make($request->all(), $rules, $messages); //Executa a validação, passando os campos a serem validados e a mensagem de erro


        //se ouver erros na validação retorna para a view crete
        if ($validator->fails()) {
               return redirect()->back()->withErrors($validator->errors());
        } else {

        $professor = Professor::where('id_professor',$id)->firstOrFail(); //a consulta para encontrar a turma a ser alterada
        $professor->nome       = Input::get('nome');//atualiza a seria da  da turma com os valores vindos do formulário de edição
        $professor->tipo = Input::get('tipo');//atualiza o bimestre  da  da turma com os valores vindos do formulário de edição
        $professor->data_admissao = Input::get('data_admissao');
        $professor->data_demissao = Input::get('data_demissao');
        $professor->save();
        Session::flash('message', 'Professor(a) '.$request->nome.' Alterado com sucesso!');
}
            return Redirect::route('professors_r.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Professor::destroy($id);
        return Redirect::route('professors_r.index');
    }
   

}
