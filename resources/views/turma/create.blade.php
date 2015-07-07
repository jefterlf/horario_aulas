@extends('app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
       <h1>Turmas</h1>
      @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Preencha os campo corretamente.</strong> <br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
          @if (Session::has('message'))
        <div class="alert alert-danger" id="sumir" >{{ Session::get('message') }}</div>
        @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Cadastro</h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" action="{!!URL::route('turmas_r.store')!!}" method="post">
              <div class="form-group">
                <label  class="col-md-4 control-label" for="serie">Série:</label>
                <div class="col-md-3">
                   <input class="form-control" type="text" name="serie"> 
                 </div>
               </div>
               <div class="form-group">
                   <label class="col-md-4 control-label"  for="bimestre">Bimestre:</label>
                 <div class="col-md-3">
                     <?php echo Form::select('id_bimestre', $bimestres, null, array('class' => 'form-control'));?>
                 </div>
               </div>                          
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
          </div>
          </div>
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
</div>
<script>
$(document).ready( function() {
        $('#sumir').delay(3000).fadeOut();
      });
</script>
@endsection