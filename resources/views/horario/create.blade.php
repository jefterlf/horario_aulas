
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro de Horarios</div>
        <div class="panel-body">

            <form class="form-horizontal" role="form" action="{!!URL::route('horarios_r.store')!!}" method="post">
              <div class="form-group">
                <label  class="col-md-4 control-label" for="dia_semana">Dia da Semana:</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="dia_semana"> 
                  </div>
              </div>
              <div class="form-group">
                <label  class="col-md-4 control-label" for="horario">Horario:</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="horario"> 
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label"  for="horario">id turma:</label>
                    <div class="col-md-6">
                    <?php echo Form::select('id_turma', $turmas, null, array('class' => 'form-control'));?>
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
</div>
@endsection