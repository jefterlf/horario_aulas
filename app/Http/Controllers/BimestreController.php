<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bimestre;
use Input, Redirect, Response;

class BimestreController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bimestres = Bimestre::all();
		return view('bimestre.index', compact('bimestres'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$bimestres = Bimestre::lists('bimestre','data_inicio','data_final');
		return view('bimestre.create', compact('bimestres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$bimestres = Bimestre::create(Input::all());
        return Redirect::route('bimestres_r.index');
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
        $bimestres = Bimestre::where('id_bimestre', $id)->firstOrFail();
        return View('bimestre.edit')->with('bimestre', $bimestres)->with(compact('bimestres'));

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $bimestres = Bimestre::where('id_bimestre',$id)->firstOrFail();
        $bimestres->data_inicio = Input::get('data_inicio');
        $bimestres->data_final = Input::get('data_final');
        $bimestres->save();
        return Redirect::route('bimestres_r.index');
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
        $bimestres = Bimestres::find($id);
        $bimestres->delete();

        // redirect
        Session::flash('message', 'Bimestre deletado com sucesso!');
        return Redirect::to('bimestres_r');
		
	}

}
