<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Cadastro de Turmas</title>	  
</head>
<body>
  <form action="{!!URL::route('turmas_route.store')!!}" method="post">
    <label for="serie">Serie:</label>
    <input type="text" name="serie"> 
      <label for="bimestre">Bimestre:</label>
    
      
      <?php echo Form::select('id_bimestre', $bimestres); ?>
      
    
      
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="submit">
  </form>
</body>
</html>	