<?php
    require_once("./db/conexao.php");

    $id_task = $_GET['id_task'];
    
    $query = "SELECT * FROM task where id_task = '$id_task'";
    $result = mysqli_query($conexao, $query);
    $tarefa = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager - Adicionar Tarefas</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" href="../css/style.css">
</head>
<body style="position: relative; background-color: var(--principal);">

  <div id="pop-up" class="editar-tarefa" style="margin: 60px 0;">
    <h1>Editar tarefa</h1>
    <form action="./db/edit_tarefas.php" method="POST">
        
        <div class="input-wrapper">
          <label for="title">Título</label>
          <input type="text" name="title" value = "<?= $tarefa['title_task']?>">

        </div>

        <div class="input-wrapper">
          <label for="description">Descrição</label>
          <textarea name="description" cols="30" rows="10"><?= $tarefa['description_task']?></textarea>
        </div>
        <div class="input-wrapper">
          <label for="date">Data</label>
          <input type="date" name="date" value = "<?= $tarefa['date_task']?>">
        </div>

        <div class="input-wrapper">
          <label for="time">Hora</label>
          <input type="time" name="time" value = "<?= $tarefa['time_task']?>">
        </div>
        
        <div class="input-wrapper" style="display: none; overflow: hidden; opacity: 0;">
          <label for="date">ID_task</label>
          <input type="text" name="id_task" value = "<?= $tarefa['id_task']?>">
        </div>

        <a href="../dashboard.php" class="sair">Voltar</a>
        <button type="submit">Editar</button>

    </form>
  </div>
  
</body>
</html>