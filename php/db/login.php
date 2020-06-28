<?php

// avisando que estamos trabalhando com o session
session_start();

// incluindo a conexao
include('./conexao.php'); 

// evitando que o usuario acesso a pagina de dashboard sem fazer o login
if(empty($_POST['email']) || empty($_POST['senha'])) {
  header('Location: ../../index.php');
  exit();
}

// guardando os valores inseridos no formuário
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// guardando o comando em uma variável
$query = "SELECT id_user, nome_user FROM user WHERE email_user = '{$email}' and senha_user = md5('{$senha}')";

// enviando o query para o banco
$result = mysqli_query($conexao, $query);

// pegando o número de linhas que o result retornou, para conferir os dados
$row = mysqli_num_rows($result);


if ($row == 1) {
  // se estiver autenticado, guarda em sessões os valores obtidos pelo query e redireciona para a página de login.
  while ($rows = mysqli_fetch_assoc($result)) { 
    $_SESSION['id'] = $rows['id_user'];
    $_SESSION['nome'] = $rows['nome_user'];
  };
  header("Location: ../../dashboard.php");
} else {
  // emitindo mensagem de erro, caso o e-mail e a senha forem inválidos, dando um refresh na página.
  $_SESSION['nao_autenticado_login'] = true;
  header('Location: ../../index.php?erro=login');
}


