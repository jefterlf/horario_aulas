
@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
      
<div class="form-group">
    <div class="col-md-10 col-md-offset-1">
          <h1>Professores   <a class="btn btn-success" href="{!!URL::route('professors_r.create')!!}"> Novo +</a></h1>
          @if (Session::has('message'))
            <div class="alert alert-info" id="sumir" >{{ Session::get('message') }}</div>
          @endif
          @if (Session::has('delet'))
            <div class="alert alert-danger" id="sumir" >{{ Session::get('delet') }}</div>
          @endif
        </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-10 col-md-offset-1">


      <div class="panel panel-default">
        
        <div class="panel-heading"><h4>Consulta</h4></div>
        <div class="panel-body">
  
  
  
    
    
  <table id="conteudo" class="table table-striped table-bordered cellspacing="0" width="100%">
     <thead>         
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Data Admissão</th>
                <th>Data Demissão</th>
                <th>Ações</th>
            </tr>
     </thead>
     <tbody>
      <?php
                foreach($professores as $professor){
       ?>
                   <tr>
                    <td>
                       <?php echo $professor->nome; ?>
                    </td>
                       <td>
                           <?php echo $professor->tipo; ?>
                       </td>
                       <td>

                           <?php echo date('d/m/Y', strtotime($professor->data_admissao)); //Rasgado

                          ?>
                       </td>
                       <td>
                           <?php echo date('d/m/Y', strtotime($professor->data_demissao)); ?>
                       </td>
                    <td>
                          <a class="btn btn-primary btn-sm" href="{{URL::to('professors_r/'. $professor->id_professor . '/edit')}}">Editar</a>
                          <a class="btn btn-danger btn-sm" href="{{URL::to('professors_r/'. $professor->id_professor)}}">Deletar</a>                                                
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

        $('#conteudo').dataTable( {
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

