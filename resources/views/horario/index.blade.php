@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel text-right">
          <a class="btn btn-primary" href="{!!URL::route('horarios_r.create')!!}">Cadastrar Novo +</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
              HORÁRIOS
            </div>
          <div class="panel-body">
            <table id="tbHorarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>         
                <tr>
                  <th>Dia Semana </th>
                  <th>Horario </th>
                  <th>ID Turma </th>
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
                      <a class="btn btn-primary" href="{{URL::to('horarios_r/'. $horario->dia_semana . '/edit')}}">Editar</a>
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