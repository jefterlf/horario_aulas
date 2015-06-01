<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use App\Bimestre;
use Input, Redirect,Response;
   use Zofe\Rapyd\Facades\DataSet;
    use Zofe\Rapyd\Facades\DataGrid;
    use Zofe\Rapyd\Facades\DataForm;
    use Zofe\Rapyd\Facades\DataEdit;
	use Zofe\Rapyd\Facades\DataFilter;

class TurmasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
	  $filter = DataFilter::source(new Turma);
   $filter->attributes(array('class'=>'form-inline'));
   $filter->add('serie','Serie', 'text');
   $filter->submit('Procurar');
   $filter->reset('Limpar');

      $grid = DataGrid::source($filter);   //same source types of DataSet

   $grid->add('id_turma','Código', true); //field name, label, sortable
   $grid->add('serie','Serie', true);
   $grid->add('{{$row->bimestre->bimestre}}','Bimestre'); //relation.fieldname 
   //$grid->link('/turmas_r/create',"Cadastrar Novo +", "TR");  //add button
   $grid->edit('/turmas_r/edit', 'Ações','modify|delete'); //shortcut to link DataEdit actions

   $grid->orderBy('id_turma','desc'); //default orderby
   $grid->paginate(3); //pagination



		return view('turma.index',compact('filter', 'grid'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$bimestres = Bimestre::lists('bimestre', 'id_bimestre');
		return view('turma.create', compact('bimestres'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$turma = Turma::create(Input::all());
		return Redirect::route('turmas_r.index');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
