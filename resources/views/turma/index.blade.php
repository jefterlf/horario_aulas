
@extends('app')
@section('content')

<div class="container-fluid">
   
  <div class="row">

    <div class="col-md-10 col-md-offset-1">
          <h1>Turmas   <a class="btn btn-success" href="{!!URL::route('turmas_r.create')!!}"> Novo +</a></h1>
      <div class="panel panel-default">
        
        <div class="panel-heading">Consulta</div>
        <div class="panel-body">
  
  
  
  <table id="tbTurmas" class="table table-striped table-bordered cellspacing" width="100%">
     <thead>         
            <tr>
                <th>Série</th>
                <th>Bimestre</th>
                <th>Ações</th>
            </tr>
     </thead>
     <tbody>
      <?php foreach($turmas as $turma){ ?>
                   <tr>
                    <td>
                       <?php echo $turma->serie; ?>
                    </td>

                    <td>
                       <?php echo $turma->bimestre->bimestre; ?>
                    </td>
                       <td> 

                          <a class="btn btn-primary btn-sm" href="{{URL::to('turmas_r/'. $turma->id_turma . '/edit')}}">Editar</a>
  <a class="btn btn-danger btn-sm" href="{{URL::to('turmas_r/'. $turma->id_turma)}}">Deletar</a>

                       </td>
                    </tr>
      <?php } ?>


     </tbody>


  </table>

 
      </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function(){

    $('#tbTurmas').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
</script>

@endsection

