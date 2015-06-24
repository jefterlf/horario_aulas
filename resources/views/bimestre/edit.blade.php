@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
          <h1>Bimestres  <a class="btn btn-success" href="{!!URL::route('bimestres_r.create')!!}">Novo +</a></h1>
           @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Preencha os campos corretamente.</strong> <br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Editar</h4></div>
        <div class="panel-body">

          {!! Form::model($bimestres, array('route' => array('bimestres_r.update', $bimestres->id_bimestre), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
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

             <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
              </div>
       {!! Form::close() !!}
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
