<?php
 
  // avisando que estamos trabalhando com sessions
  session_start();
  
  // Caso o usuário não esteja logado, redireciona para o index
  if (!$_SESSION['nome']) {
    header('Location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager - Adicionar Tarefas</title>

  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../img/favicon.ico">

  <!-- jQuery para contar caracteres -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- jQuery para contar caracteres -->
  
</head>
<body style="position: relative; background-color: var(--principal);">

  <div id="pop-up" class="adicionar-tarefa" style="margin: 60px 0;">
      <h1>Adicionar tarefa</h1>
      <form action="./db/add_tarefas.php" method="POST">
        
        <div class="input-wrapper">
          <label for="title">Título*</label>
          <input type="text" name="title" placeholder="Informe o título da tarefa" required>

        </div>

        <div class="input-wrapper" style="position: relative;">
          <label for="description">Descrição</label>
          <textarea id="description" name="description" maxlength="250" cols="30" rows="10" placeholder="Digite uma breve descrição"></textarea>
          <div class="contador-de-caracteres" style="background-color: white; color: var(--principal); position: absolute; bottom: 10px; right: 10px; font-size: 14px;"><span class="caracteres">250</span> caracteres restantes</div>
        </div>

        <div class="input-wrapper">
          <label for="date">Data*</label>
          <input type="date" name="date" required>
        </div>

        <div class="input-wrapper">
          <label for="time">Hora</label>
          <input type="time" name="time">
        </div>

        <a href="../dashboard.php" class="sair">Voltar</a>
        <button type="submit">Adicionar</button>

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