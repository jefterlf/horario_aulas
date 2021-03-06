@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
    
<div class="form-group">
    <div class="col-md-10 col-md-offset-1">
        <h1>Matérias <a class="btn btn-success" href="{!!URL::route('materias_r.create')!!}">  Novo +</a></h1>
        @if (Session::has('message'))
        <div class="alert alert-info" id="sumir" >{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('delet'))
        <div class="alert alert-danger" id="sumir" >{{ Session::get('delet') }}</div>
        @endif
        <div class="panel text-right">
    
         </div>
  </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        
        <div class="panel-heading"><h4>Consulta</h4></div>
        <div class="panel-body">
  
  
  
  <table id="tbMaterias" class="table table-striped table-bordered cellspacing" width="100%">
     <thead>         
            <tr>
                <th>Nome da Matéria</th>
                <th>Dia da Semana</th>
                <th>Tempo</th>
                <th>Turma</th>
                <th>Professor</th>
                <th>Ações</th>
            </tr>
     </thead>

      <tbody>
                <?php foreach($materias as $materia) { ?>
                  <tr>
                    <td>
                      <?php echo $materia->nome_materia ?>
                    </td>
                    <td>
                      <?php echo $materia->dia_semana ?>
                    </td>
                    <td>
                      <?php echo $materia->horario ?>
                    </td>
                    <td>
                      <?php echo $materia->turma->serie ?>
                    </td>
                    <td>
                      <?php echo $materia->professor->nome ?>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{URL::to('materias_r/'. $materia->id_materia . '/edit')}}">Editar</a>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('materias_r/'. $materia->id_materia)}}">Deletar</a>
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
</div>

<script>
  $(document).ready(function(){

    $('#tbMaterias').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });

  $(document).ready( function() {
      $('#sumir').delay(3000).fadeOut();
  });
  </script>

@endsection