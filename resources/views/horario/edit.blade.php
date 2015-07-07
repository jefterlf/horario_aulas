
@extends('app')
@section('content')
<!--/*testanto */-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
          <h1>Horários  <a class="btn btn-success" href="{!!URL::route('horarios_r.create')!!}">Novo +</a>    </h1>
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro</div>
        <div class="panel-body">

        	<div class="panel-body">

         {!! Form::model($horario, array('route' => array('horarios_r.update', $horario->dia_semana .','.$horario->horario . ',' . $horario->id_turma), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
               
              <div class="form-group">
                <label  class="col-md-4 control-label" for="dia_semana">Dia semana:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="dia_semana" value="{{ $horario->dia_semana }}"> 
                 </div>
               </div>
               <div class="form-group">
                <label  class="col-md-4 control-label" for="horario">Horario:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="horario" value="{{ $horario->horario }}">
                 </div>
               </div>
               <div class="form-group">
                   <label class="col-md-4 control-label"  for="id_turma">Turma:</label>
                 <div class="col-md-6">
                  
                     <?php echo Form::select('id_turma', array('0' => 'Selecione') + $turmas, $horario->id_turma, array('class' => 'form-control'));?>
            																			
                   
                 </div>
               </div>
         
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <input type="submit" class="btn btn-primary" value="Salvar" />
                </div>
                </div>
   
  {!! Form::close() !!}
      </div>
          
      </div>
      </div>
    </div>
  </div>
</div>

<nav>
  <ul class="pager">
    <li ><a href="{!!URL::route('horarios_r.index')!!}" >Voltar</a></li>
  </ul>
</nav>

</div>

@endsection