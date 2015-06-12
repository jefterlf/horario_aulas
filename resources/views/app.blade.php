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

	<link href="../resources/DataTables/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="{{ asset('/css/menu.css') }}" rel="stylesheet">
	<!-- Scripts -->
	<script src="../resources/jquery/jquery.min.js"></script>
	<script src="../resources/bootstrap/bootstrap.min.js"></script>
	<script src="../resources/DataTables/js/jquery.dataTables.min.js"></script>
	<script src="../resources/DataTables/js/dataTables.bootstrap.js"></script>

	 <script src="{{ asset('/js/menu.js') }}"></script>

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
<nav class="navbar navbar-default">
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
<div id="navbar" class="navbar-collapse collapse">
	
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
			  <li><a href="{{ url('/auth/register') }}">Usuários</a></li>
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
	 

	/*
	 
	 $("ul li").click(function(e){
		 e.preventDefault();
	    $("ul li").removeClass();
        $(this).addClass("active");
	    $("#menu-line").css("width",$(this).css("width"));
	 
		 var p = $(this).position();
		
		  $("#menu-line").css("left",p.left);
		  
		 // var link = $(this).find('a').attr("href");
		//$(this).find('a')[0].click();
	
		 return true;
 	 
	 	});   
		 
		*/
});  
 
 

 </script>
 
