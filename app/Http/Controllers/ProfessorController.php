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
        return view('professor.create', compact('professores'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$professores = Professor::create(Input::all());
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
        // get the nerd
        $professores = Professor::find($id);

        // show the edit form and pass the nerd
        return View('professors_r.edit')->with('professor', $professores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {


            Session::flash('message', 'Professor atualizado com sucesso!');
            return Redirect::to('professors_r');
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $professores = Professor::find($id);
        $professores->delete();

        // redirect
        Session::flash('message', 'Professor deletado com sucesso!');
        return Redirect::to('professors_r');
    }

}



