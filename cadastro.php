<?php

// avisando que estamos trabalhando com o session
session_start();

// incluindo a conexao
include('conexao.php'); 

// guardando os valores inseridos no formuário
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// conferindo se já há um mesmo e-mail cadastrado
$querySelect = "SELECT id_user FROM user WHERE email_user = '{$email}'";

// enviando o query para o banco
$resultSelect = mysqli_query($conexao, $querySelect);

// caso retorne uma linha, há email cadastrado
$row = mysqli_num_rows($resultSelect);
if ($row == 1) {
  echo "O e-mail informado já está cadastrado";
} else {
  // guardando o comando em uma variável
  $queryInsert = "INSERT INTO user(nome_user, email_user, senha_user) VALUES ('{$nome}', '{$email}', md5('{$senha}'))";

  // enviando o query para o banco
  $resultInsert = mysqli_query($conexao, $queryInsert);
  // $_SESSION['nao_autenticado'] = true;
  header('Location: index.php');
  exit();
}