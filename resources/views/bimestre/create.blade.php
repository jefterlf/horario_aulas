
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <h1>Bimestre</h1>
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
        <div class="panel-heading">
          <h4>Cadastro</h4>  
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="{!!URL::route('bimestres_r.store')!!}" method="post">
              <div class="form-group">
                <label  class="col-md-4 control-label" for="bimestre">Bimestre:</label>
                <div class="col-md-3">
                   <input class="form-control" type="text" name="bimestre">
                 </div>
               </div>
          
                <div class="form-group">
                    <label  class="col-md-4 control-label" for="data_inicio">Data de Início:</label>
                    <div class="col-md-3">
                        <input class="form-control" type="date" name="data_inicio">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-4 control-label" for="data_final">Data Final:</label>
                    <div class="col-md-3">
                        <input class="form-control" type="date" name="data_final">
                    </div>
                </div>
              
                
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary" value="Cadastrar">
          </div>
          </div>
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