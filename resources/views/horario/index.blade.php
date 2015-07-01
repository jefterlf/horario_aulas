@extends('app')
@section('content')
<!--/*testanto */-->
<div class="container-fluid">
  <div class="row">
    <div class="form-group">
      <div class="col-md-10 col-md-offset-1">
        <h1>Horários <a class="btn btn-success" href="{!!URL::route('horarios_r.create')!!}">Novo +</a></h1>
          @if (Session::has('message'))
            <div class="alert alert-info" id="mensagem">{{ Session::get('message') }}</div>
          @endif

          @if (Session::has('delet'))
            <div class="alert alert-danger" id="mensagem">{{ Session::get('delet') }}</div>
          @endif
        </div>
      </div>
    </div>
  <div class="row">  
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Consulta</h4></div>
          <div class="panel-body">
            <table id="tbHorarios" class="table table-striped table-bordered cellspacing" width="100%">
              <thead>         
                <tr>
                  <th>Dia da Semana </th>
                  <th>Tempo </th>
                  <th>Série</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($horarios as $horario) { ?>
                  <tr>
                    <td>
                      <?php echo $horario->dia_semana ?>
                    </td>
                    <td>
                      <?php echo $horario->horario ?>
                    </td>
                    <td>
                      <?php echo $horario->turma->serie ?>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{URL::to('horarios_r/'. $horario->dia_semana .','. $horario->horario .','.$horario->id_turma . '/edit')}}">Editar</a>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('horarios_r/'. $horario->dia_semana .','. $horario->horario .','.$horario->id_turma )}}">Deletar</a>
                    </td>
                  </tr>
                <?php } ?>                 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<script>
  $(document).ready(function(){
    $('#tbHorarios').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
</script>
@endsection