
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
 <div class="col-md-8 col-md-offset-2">
 <h1>Materias   <a class="btn btn-success" href="{!!URL::route('turmas_r.create')!!}"> Novo +</a></h1>
      <div class="panel panel-default">
        
        <div class="panel-heading">Consulta</div>
        <div class="panel-body">
  
        <div class="panel-body">

         {!! Form::model($materia, array('route' => array('materias_r.update', $materia->id_materia), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}

              <div class="form-group">
                    <label class="col-md-4 control-label" for="nome_materia">Nome da Matéria:</label>
                    <div class="col-md-3">

                     <select class="form-control" id="nome_materia" name="nome_materia">
                      <option value="Arte">Arte</option>
                      <option value="Biologia">Biologia</option>
                      <option value="Espanhol">Espanhol</option>
                      <option value="Filosofia">Filosofia</option>
                      <option value="Física">Física</option>
                      <option value="Geografia">Geografia</option>
                      <option value="História">História</option>
                      <option value="Inglês">Inglês</option>
                      <option value="Língua Portuguesa">Língua Portuguesa</option>
                      <option value="Literatura">Literatura</option>
                      <option value="Matemática">Matemática</option>
                      <option value="Química">Química</option>
                      <option value="Sociologia">Sociologia</option>
                      </option>                     
                    </select>


                    </div>
                </div>


              <div class="form-group">
                <label  class="col-md-4 control-label" for="dia_semana">Dia da Semana:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="dia_semana" value="{{ $materia->dia_semana }}"> 
                 </div>
               </div>

               <div class="form-group">
                <label  class="col-md-4 control-label" for="horario">Tempo:</label>
                <div class="col-md-6">
                    <?php echo Form::select('horario', array('0' => 'Selecione') + $horario, $materia->horario, array('class' => 'form-control'));?>
                 </div>
               </div>

            <div class="form-group">
                <label  class="col-md-4 control-label" for="id_turma">Turma:</label>
                <div class="col-md-6">
                    <?php echo Form::select('id_turma', array('0' => 'Selecione') + $turma, $materia->id_turma, array('class' => 'form-control'));?>
                </div>
            </div>

               <div class="form-group">
                   <label class="col-md-4 control-label"  for="bimestre">Professor:</label>
                 <div class="col-md-6">
                  
                    
                     <?php echo Form::select('id_professor', array('0' => 'Selecione') + $professores, $materia->id_professor, array('class' => 'form-control'));?> 
                     
                   
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
<nav>
  <ul class="pager">
    <li onclick="window.history.back();" ><a href="" >Voltar</a></li>
  </ul>
</nav>
</div>
@endsection