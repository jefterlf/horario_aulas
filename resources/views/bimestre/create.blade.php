
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
      @if (Session::has('message'))
        <div class="alert alert-danger" id="sumir" >{{ Session::get('message') }}</div>
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
                  <select class="form-control" id="bimestre" name="bimestre">
                    <option value="1º Bimestre">1º Bimestre</option>
                    <option value="2º Bimestre">2º Bimestre</option>
                    <option value="3º Bimestre">3º Bimestre</option>
                    <option value="4º Bimestre">4º Bimestre</option>
                  </select>
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
    <li ><a href="{!!URL::route('bimestres_r.index')!!}" >Voltar</a></li>
  </ul>
</nav>
</div>
<script>
$(document).ready( function() {
        $('#sumir').delay(3000).fadeOut();
      });
</script>
@endsection