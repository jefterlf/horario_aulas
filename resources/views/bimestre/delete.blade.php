
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
 <div class="col-md-8 col-md-offset-2">
 <h1>Bimestre</h1>
      <div class="panel panel-default">
        
       <div class="alert alert-danger" role="alert">
       
  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('bimestres_r.destroy', $bimestres->id_bimestre))) !!}
 <h4> Você realmente deseja deletar este registro?  
  {!! Form::submit('Deletar', array('class' => 'btn btn-danger')) !!}
  <input onclick="window.history.back();"  type="submit" class="btn btn-primary" value="Cancelar" />
  {!! Form::close() !!}    
 </h4>

      </div>
      <div class="panel-body">
      <div class="panel-body">
        <form class="form-horizontal">
        <fieldset disabled>
              <div class="form-group">
                <label  class="col-md-4 control-label" for="bimestre">Bimestre:</label>
                <div class="col-md-3">
                   <input class="form-control" type="text" name="bimestre" value="{{ $bimestres->bimestre }}">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-md-4 control-label" for="data_inicio">Data Inicial:</label>
                <div class="col-md-3">
                   <input class="form-control" type="date" name="data_inicio" value="{{ $bimestres->data_inicio }}">
                </div>
              </div>
              <div class="form-group">
               <label class="col-md-4 control-label"  for="data_final">Data Final:</label>
               <div class="col-md-3">
                   <input class="form-control" type="date" name="data_final" value="{{ $bimestres->data_final }}">
               </div>
              </div>
        </fieldset>
      </form>
      </div>
    </div>
  </div>

  </div>
</div>
<nav>
  <ul class="pager">
    <li onclick="window.history.back();" ><a href="" >Voltar</a></li>
  </ul>
</nav>
</div>
@endsection