
@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
    
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel text-right">
     <a class="btn btn-success" href="{!!URL::route('professors_r.create')!!}">Cadastrar Novo +</a>
         </div>
  </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        
        <div class="panel-heading">Professores</div>
        <div class="panel-body">
  
  
  
  <table id="tbProfessor">
     <thead>         
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Data Admissão</th>
                <th>Data Demissão</th>
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
                           <?php echo $professor->data_admissao; ?>
                       </td>
                       <td>
                           <?php echo $professor->data_demissao; ?>
                       </td>

                  

                    </tr>
     </tbody>
      <?php
                }
            ?>


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
      $('#tbProfessor').DataTable();
  });
</script>

@endsection

