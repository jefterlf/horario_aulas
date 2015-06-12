
@extends('app')
<html>
	<head>
		<title>Escola Amélio</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Escola Amélio</div>
				<div class="quote">Técnicos em informática turma 1</div>
				<div class="content" >
     			<a href="{{URL::to('/auth/login')}}" class="botao01">logar</a>
				</div>
			</div>
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
	</body>
</html>
