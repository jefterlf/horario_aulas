
@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                  <h1>Professores  <a class="btn btn-success" href="{!!URL::route('professors_r.create')!!}"> Novo +</a></h1>
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
                <div class="panel-heading">Editar</div>
                <div class="panel-body">

                    {!! Form::model($professor, array('route' => array('professors_r.update', $professor->id_professor), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
                    <div class="form-group">
                        <label  class="col-md-4 control-label" for="nome">Nome:</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="nome" value="{{ $professor->nome }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"  for="tipo">Tipo:</label>
                        <div class="col-md-3">

                            <select id="tipo" class="form-control" name="tipo"><option value="Contratado">Contratado</option>
                                <option value="Efetivo">Efetivo</option></select>


                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-md-4 control-label" for="data_admissao">Data Admissão:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="data_admissao" value="{{ $professor->data_admissao }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-4 control-label" for="data_demissao">Data Demissão:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="data_demissao" value="{{ $professor->data_demissao }}">
                        </div>
                    </div>

                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" value="Salvar" />
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
    <li ><a href="{!!URL::route('professors_r.index')!!}" >Voltar</a></li>
  </ul>
</nav>
</div>
@endsection