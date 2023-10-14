<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Study Manager</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="./css/index.css">
  <link rel="shortcut icon" href="./img/favicon.ico">

</head>
<body>
  <div id="login">
    <div class="container">
      <div class="left">
        
      </div>
      <div class="right">       
        <div class="form" data-form="login">           
          <form action="./php/db/login.php" method="POST">
            <h1>Welcome to<span>Study Manager!</span></h1>

            <!-- Mensagem de erro -->
            <?php
              if(isset($_SESSION['nao_autenticado_login'])) {
            ?>  
            <div class="erro">
              <div class="icone">
                <i class="fa fa-exclamation fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <p>Invalid E-mail or Password!</p>
            </div>
            <?php
              }
              unset($_SESSION['nao_autenticado_login'])
            ?>
            <!-- Mensagem de erro -->

            <div class="input">
              <input name="email" type="email" placeholder="E-mail*" required>
              <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
            </div>            
            <div class="input">
              <input name="senha" type="password" placeholder="Password*" required>
              <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
            </div>        
            
            <div class="botoes">
              <button type="submit">Enter</button>
              <a href="#">Register</a>
            </div>
          </form>
        </div>
        <div class="form" data-form="cadastro">
           
          <form action="./php/db/cad_usuario.php" method="POST" class="cadastro">
            <h1>Make your <span>Registration!</span></h1>

            <!-- Mensagem de erro -->
            <?php
              if(isset($_SESSION['nao_autenticado_cadastro'])) {
            ?>  
            <div class="erro">
              <div class="icone">
                <i class="fa fa-exclamation fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <p>E-mail already exist!</p>
            </div>
            <?php
              }
              unset($_SESSION['nao_autenticado_cadastro'])
            ?>
            <!-- Mensagem de erro -->

            <div class="input">
              <input name="nome" type="text" placeholder="Name and Username*" required>
              <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
            </div>  
            <div class="input">
              <input name="email" type="email" placeholder="E-mail*" required>
              <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
            </div>            
            <div class="input">
              <input name="senha" type="password" placeholder="Password*" required>
              <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
            </div>        
            
            <div class="botoes">
              <a href="#">Go To Back</a>
              <button type="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="./js/index.js"></script>
</body>
</html>