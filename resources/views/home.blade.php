@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">      
      <div class="panel panel-default">
        <div class="panel-heading" align="center">
          <h3>E.E. Amélio de Carvalho Baís</h3>
          <h4>Relatório de Professores (Individual)</h4>
        </div>        
        <div class="panel-body">
          


          <form class="form-horizontal" role="form" action="{!!URL::route('homes_r.show')!!}" method="post">
            <div class="form-group">

              <label class="col-md-4 control-label" for="id_turma" >HORÁRIO :</label>
                <div class="col-md-3">
                  <?php echo Form::select('id_turma', $turma, null, array('class' => 'form-control'));?>     
                </div>
                  <input type="submit" class="btn btn-primary" value="Consultar">
           
            </div>                          
          </form>
<thead>
                <tr>
                  <th>Tempo</th>
                  <th>Seg</th>
                  <th>Ter</th>
                  <th>Qua</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($horarios as $horario) {
                ?>
                  <tr>
                    <td>
                      <?php echo $horario->dia_semana; ?>
                    </td>

                    <td>
                      <?php echo $horario->horario; ?>
                    </td>

                    <td>
                      <?php echo $horario->id_turma; ?>
                    </td>

                    <td>
                      
                    </td>  
                  </tr> 
              <?php
                  }
              ?> 
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div> 

@endsection
