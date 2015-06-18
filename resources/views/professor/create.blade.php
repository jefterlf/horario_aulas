
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Professores</h1>
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro
          
        </div>
        <div class="panel-body">

            <form class="form-horizontal" role="form" action="{!!URL::route('professors_r.store')!!}" method="post">
              <div class="form-group">
                <label  class="col-md-4 control-label" for="nome">Nome:</label>
                <div class="col-md-5">
                   <input class="form-control" type="text" name="nome">
                 </div>
               </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"  for="tipo">Tipo:</label>
                    <div class="col-md-3">

                     <select class="form-control" id="tipo" name="tipo"><option value="Contratado">Contratado</option>
                         <option value="Efetivo">Efetivo</option></select>


                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-md-4 control-label" for="data_admissao">Data Admissão:</label>
                    <div class="col-md-3">
                        <input class="form-control" type="date" name="data_admissao">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-4 control-label" for="data_demissao">Data Demissão:</label>
                    <div class="col-md-3">
                        <input class="form-control" type="date" name="data_demissao">
                    </div>
                </div>
              
                
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary">
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