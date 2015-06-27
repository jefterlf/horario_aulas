  @extends('app')
  @section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="form-group">
        <div class="col-md-10 col-md-offset-1">
          <h1>Bimestre <a class="btn btn-success" href="{!!URL::route('bimestres_r.create')!!}"> Novo +</a></h1>  
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
            <table id="tbBimestre" class="table table-striped table-bordered cellspacing" width="100%">
              <thead>
                <tr>
                  <th>Bimestre</th>
                  <th>Data Inicial</th>
                  <th>Data Final</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($bimestres as $bimestre) {
                ?>
                  <tr>
                    <td>
                      <?php echo $bimestre->bimestre; ?>
                    </td>

                    <td>
                      <?php echo date('d/m/Y', strtotime($bimestre->data_inicio)); ?>
                    </td>

                    <td>
                      <?php echo date('d/m/Y', strtotime($bimestre->data_final)); ?>
                    </td>

                    <td>
                      <a class="btn btn-primary btn-sm" href="{{URL::to('bimestres_r/'. $bimestre->id_bimestre . '/edit')}}">Editar</a>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('bimestres_r/'. $bimestre->id_bimestre)}}">Deletar</a>
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
  
  <script>
  $(document).ready(function(){

    $('#tbBimestre').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
  $(document).ready( function() {
        $('#mensagem').delay(3000).fadeOut();
  });
  </script>

 @endsection