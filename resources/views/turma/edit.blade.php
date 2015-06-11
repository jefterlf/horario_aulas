
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro de Turmas</div>
        <div class="panel-body">

          {!! Form::model($turma, array('route' => array('turmas_r.update', $turma->id_turma), 'method' => 'PUT')) !!}
              <div class="form-group">
                <label  class="col-md-4 control-label" for="serie">Serie:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="serie" value="{{ $turma->serie }}"> 
                 </div>
               </div>
               <div class="form-group">
                   <label class="col-md-4 control-label"  for="bimestre">Bimestre:</label>
                 <div class="col-md-6">
                  
                     <?php echo Form::select('id_bimestre', array('0' => 'Selecione') + $bimestres, $turma->id_bimestre, array('class' => 'form-control'));?>
            
                   
                 </div>
               </div>
              
                
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary" value="Salvar">
          </div>
          </div>
  {!! Form::close() !!}
      </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection