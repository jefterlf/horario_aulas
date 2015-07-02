@extends('app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">      
      <div class="panel panel-default">
        <div class="panel-heading" align="center">
          <h3>E.E. Amélio de Carvalho Baís</h3>
          <h4>Relatório de Professores (Individual)</h4>
        </div>        
        <div class="panel-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-md-4 control-label">HORÁRIO :</label>
                <div class="col-md-3">
                  <?php echo Form::select('id_turma', $turma, null, array('class' => 'form-control'));?>     
                </div>
                  <a class="btn btn-small btn-success" href="">Consultar</a>
            </div>                          
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 

@endsection
