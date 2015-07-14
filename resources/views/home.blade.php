@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">      
      <div class="panel panel-default">
        <div class="panel-heading" align="center">
          <h3>E.E. Amélio de Carvalho Baís</h3>
          <h4>Relatório de Professores (Individual)</h4>
        </div>        
        <div class="panel-body">
          <form class="form-horizontal" role="form" action="{!!URL::route('homes_r.store')!!}" method="post">
            <div class="form-group">
              <label class="col-md-4 control-label" for="id_turma">
                TURMA :
              </label>
                <div class="col-md-2">
                  <?php echo Form::select('id_turma', $turma, null, array('class' => 'form-control'));?>     
                </div>
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                  <input type="submit" class="btn btn-primary" value="Consultar">
            </div>                          
          </form>
          <div class="row">  
            <div class="col-md-8 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">Turma: <?php
                  if(isset($consulta)){
                 echo $consulta->serie; }?></div>
                  <div class="panel-body">
                    
                    <table class="table" width="100%">
                      <thead>
                        <tr>
                          <th>Tempo</th>
                          <th>Segunda-feira</th>
                          <th>Terça-feira</th>
                          <th>Quarta-feira</th>
                          <th>Quinta-feira</th>
                          <th>Sexta-feira</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if(isset($horario)){
                          foreach($horario as $horarios) {
                      ?>
                      <tr>
                        <td>
                          <?php //echo $horarios->id_turma; ?>
                        </td>
                        <td>
                          <?php //echo $horarios->materia->nome_materia; ?>
                        </td>
                        <td>
                          <?php //echo $horarios->materia->nome_materia; ?>
                        </td>  
                        <td>
                          <?php //echo $horarios->materia->nome_materia; ?>
                        </td>  
                        <td>
                          <?php //echo $horarios->materia->nome_materia; ?>
                        </td>  
                        <td>
                          <?php //echo $horarios->materia->nome_materia; ?>
                        </td>  
                      </tr> 
                      <?php
                        }   
                      }
                      ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <script>
  $(document).ready(function(){
    $('#tbRelatorio').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
  </script>   
@endsection
