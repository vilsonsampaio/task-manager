<?php
    
  // incluindo a conexao
  include('./php/db/conexao.php');
  include('./verifica_login.php');

  $id_user = $_SESSION['id'];
  
  // verificando se está sendo passado por parâmetro algum valor de busca
  if (isset($_GET['busca'])) {
    $dataCompleta = $_GET['busca'];
    $dia = explode("/",$dataCompleta)[0];
    $mes = explode("/",$dataCompleta)[1];
    $ano = explode("/",$dataCompleta)[2];
    $busca = $ano.'-'.$mes.'-'.$dia;
  } else {
    $busca = '';
  }

  // guardando o comando em uma variável
  $queryPendentes = "SELECT id_task, title_task, description_task, date_task, time_task FROM task WHERE id_user = '{$id_user}' AND status_task = 'pendente' AND date_task LIKE '%{$busca}%' ORDER BY date_task, time_task ASC";

  // enviando o query para o banco
  $resultPendentes = mysqli_query($conexao, $queryPendentes);

  // transformando os dados em um array
  $arrayTarefasPendentes = mysqli_fetch_assoc($resultPendentes);

  // pegando o número de linhas que o result retornou, para conferir os dados
  $iPendentes = mysqli_num_rows($resultPendentes);




   // guardando o comando em uma variável
   $queryConcluidas = "SELECT id_task, title_task, description_task, date_task, time_task FROM task WHERE id_user = '{$id_user}' AND status_task = 'concluida' AND date_task LIKE '%{$busca}%' ORDER BY date_task, time_task ASC";

   // enviando o query para o banco
   $resultConcluidas = mysqli_query($conexao, $queryConcluidas);
 
   // transformando os dados em um array
   $arrayTarefasConcluidas = mysqli_fetch_assoc($resultConcluidas);
 
   // pegando o número de linhas que o result retornou, para conferir os dados
   $iConcluidas = mysqli_num_rows($resultConcluidas);


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
        <a href="dashboard.php" class="logotipo">
          <div class="icone">
            <i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i>
          </div>
          <h1>Task Manager</h1>
        </a>
        <div class="perfil">
          <div class="avatar"></div>
          <div class="nome">
            <h1><?php echo $_SESSION['nome'];?></h1>
            <a href="./php/db/logout.php">
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
          <form class="pesquisa">
             
            <input name="busca" type="text" placeholder="Pesquise por data (DD/MM/AAAA)...">
            <button class="submit">
              <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
            </button>
              
          </form>
          <a href="./php/adicionar_tarefas.php" class="adicionar">
              <div class="icone">
                <i class="fa fa-plus fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <h2>Nova tarefa</h2>
          </a>
        </div>
        <div class="cards">

          <div class="pendentes">
            <?php
              // se o número de resultados for maior que zero, mostra os dados
              if($iPendentes > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
            ?>

            <dl class="card js-card">
              <div>

              </div>
              <dt class="header">
                <a href="./php/db/edit_tarefas_pendentes.php?id_task=<?= $arrayTarefasPendentes['id_task']?>" class="check">
                  <i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i>
                </a>
                <h1><?php echo $arrayTarefasPendentes['title_task'];?></h1>
                <a class="seta" href="#">
                  <i class="fa fa-chevron-down fa-lg fa-fw setas ativo" aria-hidden="true"></i>
                  <i class="fa fa-chevron-up fa-lg fa-fw setas" aria-hidden="true"></i>
                </a>
              </dt>
              <dd>
                <p><?php echo $arrayTarefasPendentes['description_task'];?></p>
              </dd>
              <footer>
                <div class="data-hora">
                  <div class="data">
                    <i class="fa fa-calendar fa-lg fa-fw" aria-hidden="true"></i>
                    <span><?php echo $arrayTarefasPendentes['date_task'];?></span>
                  </div>
                  <div class="hora">
                    <img src="https://image.flaticon.com/icons/svg/1124/1124602.svg"></i>
                    <span><?php echo $arrayTarefasPendentes['time_task'];?></span>
                  </div>
                </div>
                <div class="opcoes">
                  <a href="./php/editar_tarefas.php?id_task=<?= $arrayTarefasPendentes['id_task']?>" class="editar">
                    <i class="fa fa-edit fa-lg fa-fw" aria-hidden="true"></i>
                  </a>
                  <a onClick="alert('Confirma exclusão?')" href="./php/db/deletar_tarefas.php?id_task=<?php echo $arrayTarefasPendentes['id_task'];?>" class="excluir">
                    <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                  </a>
                </div>
              </footer>
            </dl>

            <?php
            // finaliza o loop que vai mostrar os dados
                }while($arrayTarefasPendentes = mysqli_fetch_assoc($resultPendentes));
              // fim do if 
              } else {
                echo '<h1 style="font-size: 23px;">Adicione uma tarefa!</h1>';
              }
            ?>
          </div>

          <div class="concluidas">
            <?php
              // se o número de resultados for maior que zero, mostra os dados
              if($iConcluidas > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
            ?>

            <dl class="card js-card checked">
              <dt class="header">
                <a href="./php/db/edit_tarefas_concluidas.php?id_task=<?= $arrayTarefasConcluidas['id_task']?>" class="check checked">
                  <i class="fa fa-check fa-lg fa-fw" aria-hidden="true"></i>
                </a>
                <h1 class="riscado"><?php echo $arrayTarefasConcluidas['title_task'];?></h1>
                <a class="seta" href="#">
                  <i class="fa fa-chevron-down fa-lg fa-fw setas ativo" aria-hidden="true"></i>
                  <i class="fa fa-chevron-up fa-lg fa-fw setas" aria-hidden="true"></i>
                </a>
              </dt>
              <dd>
                <p><?php echo $arrayTarefasConcluidas['description_task'];?></p>
              </dd>
              <footer>
                <div class="data-hora">
                  <div class="data">
                    <i class="fa fa-calendar fa-lg fa-fw" aria-hidden="true"></i>
                    <span><?php echo $arrayTarefasConcluidas['date_task'];?></span>
                  </div>
                  <div class="hora">
                    <img src="https://image.flaticon.com/icons/svg/1124/1124602.svg"></i>
                    <span><?php echo $arrayTarefasConcluidas['time_task'];?></span>
                  </div>
                </div>
                <div class="opcoes">
                  <a href="./php/editar_tarefas.php?id_task=<?= $arrayTarefasConcluidas['id_task']?>" class="editar">
                    <i class="fa fa-edit fa-lg fa-fw" aria-hidden="true"></i>
                  </a>
                  <a onClick="alert('Confirma exclusão?')" href="./php/db/deletar_tarefas.php?id_task=<?php echo $arrayTarefasConcluidas['id_task'];?>" class="excluir">
                    <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                  </a>
                </div>
              </footer>
            </dl>

            <?php
            // finaliza o loop que vai mostrar os dados
                }while($arrayTarefasConcluidas = mysqli_fetch_assoc($resultConcluidas));
              // fim do if 
              } else {
                echo '<h1 style="font-size: 23px;">Nenhuma tarefa foi concluída!</h1>';
              }
            ?>
          </div>
          
        </div>
        
        
      </div>
    </main>
  </section>

  <!--JavaScript-->
  <script src="./js/scripts.js"></script>
  <!--JavaScript-->
  
</body>
</html>