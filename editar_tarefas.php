<?php
  include("./php/db/conexao.php");

  // Caso o usuário não esteja logado, redireciona para o index
  include('./php/db/verificar_login.php');

  $id_task = $_GET['id_task'];

  // Pegando os dados da tarefa para inserir automaticamente no formulário
  $query = "SELECT * FROM task where id_task = '$id_task'";
  $result = mysqli_query($conexao, $query);
  $tarefa = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Study Management - Edit Lesson</title>

  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="shortcut icon" href="./img/favicon.ico">

  <!-- jQuery para contar caracteres -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- jQuery para contar caracteres -->

</head>
<body>

  <div id="pop-up" class="editar-tarefa">
    <form action="./php/db/edit_tarefas.php" method="POST">
      <h1>Edit Lesson</h1>
      <div class="input-titulo">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Enter the lesson title" value = "<?= $tarefa['title_task']?>">
      </div>

      <div class="input-descricao" style="position: relative;">
        <label for="description">Description</label>
        <textarea id="description" name="description" maxlength="250" cols="30" rows="10" placeholder="Enter a brief description"><?= $tarefa['description_task']?></textarea>
        <div class="contador-de-caracteres" style="background-color: white; color: var(--principal); position: absolute; bottom: 10px; right: 10px; font-size: 14px;"><span class="caracteres">250</span> character remaining</div>
      </div>

      <div class="input-data-hora">
        <div class="input-wrapper">
          <label for="date">Date</label>
          <input type="date" name="date" value = "<?= $tarefa['date_task']?>">
        </div>

        <div class="input-wrapper">
          <label for="time">Hour</label>
          <input type="time" name="time" value = "<?= $tarefa['time_task']?>">
        </div>
      </div>
        
        
      <input type="hidden" name="id_task" value = "<?= $tarefa['id_task']?>">


      <a href="./dashboard.php" class="sair">Go Back</a>
      <button type="submit">Edit</button>

    </form>
  </div>
  
  <!-- Contador de caracteres -->
  <script text="javascript">
    $(document).on("input", "#description", function () {
    var caracteresRestantes = 250;
    var caracteresDigitados = parseInt($(this).val().length);
    var caracteresRestantes = caracteresRestantes - caracteresDigitados;

    $(".caracteres").text(caracteresRestantes);
    });
  </script>
  <!-- Contador de caracteres -->

  
</body>
</html>