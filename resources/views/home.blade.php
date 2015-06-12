@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Início</div>

				<div class="panel-body">
					Você está logado!
                    <br/>
                    <a class="btn btn-success" href="{!!URL::route('turmas_r.index')!!}"> Voltar</a></h1>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
