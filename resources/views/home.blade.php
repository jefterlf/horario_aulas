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
          <table id="TabelaTeste" class="table table-striped table-bordered cellspacing" width="100%">
        	   <form class="form-vertical" role="form" method="post">
        		    <thead>
              	  <tr>
                    <th>Professor</th>
                    <th>Professor</th>
                    <th>Professor</th>
              		</tr>
       						</thead>
              </form>
          </table>	
        </div>
      </div>
    </div>
  </div>
</div>
              	
<script>
	$(document).ready(function(){
    $('#TabelaTeste').dataTable( {
        "language": {
            "url": "../resources/DataTables/Portuguese-Brasil.json"
        }
    } );
  });
</script>

@endsection
