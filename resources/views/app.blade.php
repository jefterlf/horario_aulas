<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>


	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- CSS -->

	<link href="{{ asset('/DataTables/css/dataTables.bootstrap.css') }}" rel="stylesheet">
	<!-- Scripts -->
	<script src="{{ asset('/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/DataTables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/DataTables/js/dataTables.bootstrap.js') }}"></script>



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		

	</style>
</head>
<body>
<nav class="navbar navbar-default" style="background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top,  #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ffffff 0%,#e5e5e5 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */
">
<div class="container-fluid">
<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Controle de Horarios EEACB</a>
</div>
<div id="navbar" class="navbar-collapse collapse"  >
	
							@if (Auth::guest())
					 <ul class="nav navbar-nav navbar-right">
	           	 		<li><a href="{{ url('/auth/login') }}">Login</a></li>
         		   </ul>
							 @else
            <ul class="nav navbar-nav">
				
                    <li><a href="{!!URL::route('turmas_r.index')!!}"><span class="glyphicon glyphicon-tags"> Turmas</a></li>
                    <li><a href="{!!URL::route('horarios_r.index')!!}"><span class="glyphicon glyphicon-time"> Horários</a></li>
                    <li><a href="{!!URL::route('professors_r.index')!!}"><span class="glyphicon glyphicon-user"> Professores</a></li>
                    <li><a href="{!!URL::route('bimestres_r.index')!!}"><span class="glyphicon glyphicon-calendar"> Bimestres</a></li>
                    <li><a href="{!!URL::route('materias_r.index')!!}"><span class="glyphicon glyphicon-book"> Matérias</a></li>

            </ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="{!!URL::route('usuarios_r.create')!!}">Usuário</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                	<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off"> Sair</a></li>
                </ul>
              </li>
			  
			 </ul>
	@endif
			

</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>

@yield('content')

</body>
</html>

<script>
$(function(){
	 

});  
 
 

 </script>
 
