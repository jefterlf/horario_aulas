@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
    
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel text-right">
     <a class="btn btn-success" href="{!!URL::route('materias_r.create')!!}">Cadastrar Novo +</a>
         </div>
  </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        
        <div class="panel-heading">Materias</div>
        <div class="panel-body">
  
  
  
  <table id="tbMaterias">
     <thead>         
            <tr>
                <th>ID</th>
                <th>Dia da semana</th>
                <th>Horario</th>
                <th>ID professor</th>
            </tr>
     </thead>
     <tbody>
      
                @foreach($materias as $materia)
       
                  <tr>
                    <td>
                        {{$materia->id_materia}}
                    </td>

                    <td>
                        {{$materia->horario->dia_semana}}
                    </td>

                    <td>
                        {{$materia->horario->horario}}
                    </td>

                    <td>
                        {{$materia->professor->id_professor}}
                    </td>
                  </tr>

                @endforeach
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
      $('#tbMaterias').DataTable();
  });
</script>

@endsection