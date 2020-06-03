<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager - Adicionar Tarefas</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" href="./css/style.css">
</head>
<body style="position: relative; background-color: var(--principal);">

  <div id="pop-up" class="adicionar-tarefa">
      <h1>Adicionar tarefa</h1>
      <form action="add_tarefas.php" method="POST">
        
        <div class="input-wrapper">
          <label for="title">Título</label>
          <input type="text" name="title" required>

        </div>

        <div class="input-wrapper">
          <label for="description">Descrição</label>
          <textarea name="description" cols="30" rows="10"></textarea>
        </div>

        <div class="input-wrapper">
          <label for="date">Data</label>
          <input type="date" name="date" required>
        </div>

        <div class="input-wrapper">
          <label for="time">Hora</label>
          <input type="time" name="time">
        </div>

        <a href="dashboard.php" class="sair">Voltar</a>
        <button type="submit">Adicionar</button>

      </form>

  </div>
  
</body>
</html>