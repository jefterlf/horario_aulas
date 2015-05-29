<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Lista de Turmas</title>
</head>
<body>
  <ul>
  <?php foreach ($turmas as $turma): ?>
    <li>
        Id: <?php echo $turma->id_turma ?>
        <br/>
        Serie: <?php echo $turma->serie ?>
        <br/>
        Bimestre: <?php echo $turma->bimestre ?>
    </li>
  <?php endforeach ?>
  </ul>
  <a href="{!!URL::route('turmas_route.create')!!}">Cadastro</a>
</body>
</html>