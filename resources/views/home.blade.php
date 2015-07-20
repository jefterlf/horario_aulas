@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">      
      <div class="panel panel-default">
        <div class="panel-heading" align="center">
          <h3>E.E. Amélio de Carvalho Baís</h3>
          <h4>Relatório de Turmas</h4>
        </div>        
        <div class="panel-body">
          <form class="form-horizontal" role="form" action="{!!URL::route('homes_r.store')!!}" method="post">
            <div class="form-group">
              <label class="col-md-4 control-label" for="id_turma">
                <strong>
                  TURMA :
                </strong>
              </label>
                <div class="col-md-2">
                  <?php echo Form::select('id_turma', $turma, null, array('class' => 'form-control'));?>     
                </div>
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                <input type="submit" class="btn btn-primary" value="Consultar"/>
            </div>                          
          </form>
          <div class="row">  
            <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>
                    <?php
                      if (isset($consulta)) {
                        echo $consulta->serie; 
                      }
                    ?>
                </div>
                  </strong>
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

                          foreach(array_chunk($horario->all(), 1) as $horarios)    {
              
                 ?>
                        
                 <?php
                           foreach ($horarios as $row) {
                           //  echo $row;
                      ?>
               <tr>
                        <td>
                          <?php echo $row['horario']; ?>
                        </td>
                        <td>
                          <strong>
                            <?php 
                              echo $row['materia'][0]['nome_materia'];
                            ?>
                          </strong>
                        </td>

                                    <td>
                          <strong>
                            <?php 
                              echo $row['materia'][1]['nome_materia'];
                            ?>
                          </strong>
                        </td>
                                                <td>
                          <strong>
                            <?php 
                          if(isset($row['materia'][2]))
                              echo $row['materia'][2]['nome_materia'];
                            ?>
                          </strong>
                        </td>
                                                <td>
                          <strong>
                            <?php 
                             // echo $row['materia'][3]['nome_materia'];
                            ?>
                          </strong>
                        </td>
                                                <td>
                          <strong>
                            <?php 
                          //    echo $row['materia'][4]['nome_materia'];
                            ?>
                          </strong>
                        </td>
                                                                      <td>
                          <strong>
                            <?php 
                          //    echo $row['materia'][4]['nome_materia'];
                            ?>
                          </strong>
                        </td>
                                            </tr>
                      <?php
                          }
                          ?>
              
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
