
@extends('app')
@section('content')



<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
          <h1>Horarios  <a class="btn btn-success" href="{!!URL::route('horarios_r.create')!!}">Novo +</a>    </h1>
      <div class="panel panel-default">
        <div class="panel-heading">Cadastro</div>
        <div class="panel-body">

          
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

 
<script>
  $(document).ready(function(){
    $('#tbHorarios').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
</script>


@endsection