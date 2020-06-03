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
          <a href="#" class="adicionar">
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
                <a href="#" class="editar">
                  <i class="fa fa-edit fa-lg fa-fw" aria-hidden="true"></i>
                </a>
                <a href="#" class="excluir">
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

  <div id="pop-up" class="adicionar-tarefa">
    <div class="container">
      <h1>Adicionar tarefa</h1>
      <form action="adicionar_tarefas.php" method="POST">
        
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

        <a href="#" class="sair">Voltar</a>
        <button>Adicionar</button>

      </form>
    </div>
  </div>

  <div id="pop-up" class="editar-tarefa">
    <div class="container">
      <h1>Editar tarefa</h1>
      <form action="">
        
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

        <a href="#" class="sair">Voltar</a>
        <button>Editar</button>

      </form>
    </div>
  </div>
  
  
  <!--JavaScript-->
  <script src="./js/dashboard.js"></script>
  <!--JavaScript-->
  
</body>
</html>

<?php
// tira o resultado da busca da memória
// mysqli_free_result($result);
?>