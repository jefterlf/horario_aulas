
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
       <h1>Turmas   </h1>
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro</div>
        <div class="panel-body">

            <form class="form-horizontal" role="form" action="{!!URL::route('turmas_r.store')!!}" method="post">
              <div class="form-group">
                <label  class="col-md-4 control-label" for="serie">Serie:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="serie"> 
                 </div>
               </div>
               <div class="form-group">
                   <label class="col-md-4 control-label"  for="bimestre">Bimestre:</label>
                 <div class="col-md-6">
                  
                     <?php echo Form::select('id_bimestre', $bimestres, null, array('class' => 'form-control'));?>
            
                   
                 </div>
               </div>
              
                
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary">
          </div>
          </div>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection