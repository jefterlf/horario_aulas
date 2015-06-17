
@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
 <div class="col-md-8 col-md-offset-2">
 <h1>Professor</h1>
      <div class="panel panel-default">
        
       <div class="alert alert-danger" role="alert">
       
  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('professors_r.destroy', $professor->id_professor))) !!}
 <h4> Você realmente deseja deletar este registro?  
                             {!! Form::submit('Deletar', array('class' => 'btn btn-danger')) !!}
                         <input onclick="window.history.back();"  type="submit" class="btn btn-primary" value="Cancelar" />
                    {!! Form::close() !!}

      
</h4>
                        

       </div>
        <div class="panel-body">
  
        <div class="panel-body">

       <form lass="form-horizontal">
                 <fieldset disabled>
              <div class="form-group">
                <label  class="col-md-4 control-label" for="nome">Nome:</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="nome" value="{{ $professor->nome }}">
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