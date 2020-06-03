<?php
    
  include('selecionar_tarefas_pendentes.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager - Dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" href="./css/style.css">
  <script>
    document.documentElement.className += ' js';
  </script>
</head>
<body>
  <section id="dashboard">    
    <header>
      <div class="container">
        <div class="logotipo">
          <div class="icone">
            <i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i>
          </div>
          <h1>Task Manager</h1>
        </div>
        <div class="perfil">
          <div class="avatar"></div>
          <div class="nome">
            <h1><?php echo $_SESSION['nome'];?></h1>
            <a href="logout.php">
              <i class="fa fa-sign-out fa-lg fa-fw icone" aria-hidden="true"></i>
            </a>
          </div>          
        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="topo">
          <h1>Tarefas</h1>
          <div class="filtro">
            <a href="#">Pendentes</a>
            <a href="#">Concluídas</a>
          </div>
        </div>
        <div class="hero">
          <div class="pesquisa">
            <input type="text" placeholder="Pesquise por data (dd/mm/aaaa)...">
            <a href="#" class="submit">
              <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
            </a>
              
          </div>
          <a href="adicionar_tarefas.php" class="adicionar">
              <div class="icone">
                <i class="fa fa-plus fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <h2>Nova tarefa</h2>
          </a>
        </div>
        <div class="cards">


          <?php
            // se o número de resultados for maior que zero, mostra os dados
            if($i > 0) {
              // inicia o loop que vai mostrar todos os dados
              do {
          ?>

          <dl class="card js-card">
            <dt class="header">
              <div class="check">
                <i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <h1><?php echo $arrayTarefas['title_task'];?></h1>
              <a href="#">
                <i class="fa fa-chevron-down fa-lg fa-fw setas ativo" aria-hidden="true"></i>
                <i class="fa fa-chevron-up fa-lg fa-fw setas" aria-hidden="true"></i>
              </a>
            </dt>
            <dd>
              <p><?php echo $arrayTarefas['description_task'];?></p>
            </dd>
            <footer>
              <div class="data-hora">
                <div class="data">
                  <i class="fa fa-calendar fa-lg fa-fw" aria-hidden="true"></i>
                  <span><?php echo $arrayTarefas['date_task'];?></span>
                </div>
                <div class="hora">
                  <img src="https://image.flaticon.com/icons/svg/1124/1124602.svg"></i>
                  <span><?php echo $arrayTarefas['time_task'];?></span>
                </div>
              </div>
              <div class="opcoes">
                <a href="editar_tarefas.php?id_task=<?= $arrayTarefas['id_task']?>" class="editar">
                  <i class="fa fa-edit fa-lg fa-fw" aria-hidden="true"></i>
                </a>
                <a onClick="alert('Confirma exclusão?')" href="deletar_tarefas.php?id_task=<?php echo $arrayTarefas['id_task'];?>" class="excluir">
                  <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                </a>
              </div>
            </footer>
          </dl>

          <?php
          // finaliza o loop que vai mostrar os dados
              }while($arrayTarefas = mysqli_fetch_assoc($result));
            // fim do if 
            } else {
              echo 'Insira uma tarefa!';
            }
          ?>
          
        </div>      
      </div>
    </main>
  </section>

  <!--JavaScript-->
  <script src="./js/scripts.js"></script>
  <!--JavaScript-->
  
</body>
</html>