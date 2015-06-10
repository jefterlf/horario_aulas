  @extends('app')
  @section('content')

  <div class="container-fluid">
      <div class="row">

  <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel text-right">
       <a class="btn btn-success" href="{!!URL::route('bimestres_r.create')!!}">Cadastrar Bimestre +</a>
           </div>
    </div>
  </div>
  </div>
    <div class="row">

      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

          <div class="panel-heading">Bimestres</div>
          <div class="panel-body">



    <table id="tbBimestre" class="table table-striped table-bordered">
       <thead>
              <tr>
                  <th>Bimestre</th>
                  <th>Data Início</th>
                  <th>Data Final</th>
              </tr>
       </thead>
       <tbody>
        <?php
                  foreach($bimestres as $bimestre){
         ?>
                     <tr>
                      <td>
                        <?php echo $bimestre->bimestre; ?>
                      </td>
                      <td>
                        <?php echo $bimestre->data_inicio; ?>
                      </td>
                      <td>
                        <?php echo $bimestre->data_final; ?>
                      </td>

                      <td>  <a class="btn btn-primary" href="{!!URL::route('bimestres_r.edit')!!}">Editar</a>
                        
                       </td>
                      </tr>

        <?php
                  }
              ?> </tbody>


    </table>


        </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
        $('#tbBimestre').DataTable();
    });
  </script>

  @endsection