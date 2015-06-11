<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Professor;
use Input, Redirect, Reponse;

use Illuminate\Http\Request;

class ProfessorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
    public function store()
    {
        $professor = Professor::create(Input::all());
        return Redirect::route('professors_r.index');
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
        $professor = Professor::where('id_professor', $id)->firstOrFail();//Faz a consulta para carregar o formulário com  a turma a ser alterad
        return View('professor.edit')->with('professors', $professor)->with(compact('professor'));//retorna $urma e $bimestres para a view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $professor = Professor::where('id_professor',$id)->firstOrFail(); //a consulta para encontrar a turma a ser alterada
        $professor->nome       = Input::get('nome');//atualiza a seria da  da turma com os valores vindos do formulário de edição
        $professor->tipo = Input::get('tipo');//atualiza o bimestre  da  da turma com os valores vindos do formulário de edição
        $professor->data_admissao = Input::get('data_admissao');
        $professor->data_demissao = Input::get('data_demissao');
        $professor->save();
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
        //
    }

}
