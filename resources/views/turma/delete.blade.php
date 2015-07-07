
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
 <div class="col-md-8 col-md-offset-2">
 <h1>Turma</h1>
      <div class="panel panel-default">
        
       <div class="alert alert-danger" role="alert">
       
  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('turmas_r.destroy', $turma->id_turma))) !!}
 <h4> Você realmente deseja deletar este registro?  
                             {!! Form::submit('Deletar', array('class' => 'btn btn-danger')) !!}
                         <input onclick="window.history.back();"  type="submit" class="btn btn-primary" value="Cancelar" />
                    {!! Form::close() !!}

      
</h4>
                        

       </div>
        <div class="panel-body">
  
        <div class="panel-body">

       <form class="form-horizontal">
                 <fieldset disabled>
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
         

   </fieldset>
  </form>


      </div>
    </div>
  </div>
</div>

</div>
<nav>
  <ul class="pager">
    <li><a href="{!!URL::route('turmas_r.index')!!}" >Voltar</a></li>
  </ul>
</nav>
</div>.
@endsection