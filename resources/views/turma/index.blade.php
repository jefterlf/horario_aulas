
@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
    
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel text-right">
     <a class="btn btn-success" href="{!!URL::route('turmas_r.create')!!}">Cadastrar Novo +</a>
         </div>
  </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        
        <div class="panel-heading">Turmas</div>
        <div class="panel-body">
  
  
  
  <table id="tbTurmas">
     <thead>         
            <tr>
                <th>Série</th>
                <th>Bimestre</th>
            </tr>
     </thead>
     <tbody>
      <?php
                foreach($turmas as $turma){
       ?>
                   <tr>
                    <td>
                       <?php echo $turma->serie; ?>
                    </td>
                       <td>
                           <?php echo $turma->bimestre->bimestre; ?>
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
      $('#tbTurmas').DataTable();
  });
</script>

@endsection

