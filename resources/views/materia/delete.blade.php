
@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
 <div class="col-md-8 col-md-offset-2">
 <h1>Turma</h1>
      <div class="panel panel-default">
        
       <div class="alert alert-danger" role="alert">
       
  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('materias_r.destroy', $materia->id_materia))) !!}
 <h4> Você realmente deseja deletar este registro?  
                             {!! Form::submit('Deletar', array('class' => 'btn btn-danger')) !!}
                         <input onclick="window.history.back();"  type="submit" class="btn btn-primary" value="Cancelar" />
  {!! Form::close() !!}

      
</h4>
                        

       </div>
        <div class="panel-body">
  
 

       <form class="form-horizontal">
                 
                 <fieldset disabled>

              <div class="form-group">
                   <label class="col-md-4 control-label"  for="nome_materia">Nome da Matéria:</label>
                 <div class="col-md-6">
                  
                    <input class="form-control" type="text" name="nome_materia" value="{{ $materia->nome_materia }}"> 
                   
                 </div>
               </div>

              <div class="form-group">
                   <label class="col-md-4 control-label"  for="id_horario">Horario:</label>
                 <div class="col-md-6">
                  
                    <input class="form-control" type="text" name="horario" value="{{ $materia->id_horario }}"> 
                   
                 </div>
               </div>

              <div class="form-group">
                <label  class="col-md-4 control-label" for="dia_semana">Dia da Semana:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="dia_semana" value="{{ $materia->dia_semana }}"> 
                 </div>
               </div>

               <div class="form-group">
                <label  class="col-md-4 control-label" for="horario">Horario:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="horario" value="{{ $materia->horario }}"> 
                 </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 control-label"  for="bimestre">Professor:</label>
                 <div class="col-md-6">
                  
                    
                     <?php echo Form::select('id_professor', array('0' => 'Selecione') + $professores, $materia->id_professor, array('class' => 'form-control'));?> 
                     
                   
                 </div>
               </div>

   </fieldset>
  </form>


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
</div>.
@endsection