
@extends('app')
@section('content')

<div class="container-fluid">
    <div class="row">
    
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel text-right">
     <a class="btn btn-success" href="{!!URL::route('horarios_r.create')!!}">Cadastrar Novo +</a>
     
  </div>
</div>
</div>
  <div class="row">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        
        <div class="panel-heading">HORARIOS</div>
        <div class="panel-body">
  
  
  
  <table id="tbHorarios">
     <thead>         
            <tr>
                <th>Dia Semana </th>
                <th>Horario </th>
                <th>ID Turma </th>
            </tr>
     </thead>
     @foreach ($horarios as $horario)
     <tbody>
                  <tr>
                    <td>
                        {{$horario->dia_semana}}
                    </td>
                    <td>
                        {{$horario->horario}}
                    </td>
                    <td>
                        {{$horario->turma->serie}}
                    </td>
                    <td>
                      <a class="btn btn-success" href="{!!URL::route('horarios_r.edit')!!}">Editar +</a>
                      <a class="btn btn-danger" href="{!!URL::route('horarios_r.edit')!!}">Apagar +</a>
                    </td>

                  </tr>
     </tbody>
      @endforeach


  </table>
jeferson teste
 
      </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

<script>
  $(document).ready(function(){
      $('#tbHorarios').DataTable();
  });
</script>

@endsection

