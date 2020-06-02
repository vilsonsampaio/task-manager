<?php

// avisando que estamos trabalhando com o session
session_start();

// incluindo a conexao
include('conexao.php'); 

// guardando os valores inseridos no formuário
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// guardando o comando em uma variável
$queryInsert = "INSERT INTO user(nome_user, email_user, senha_user) VALUES ('{$nome}', '{$email}', md5('{$senha}'))";

// enviando o query para o banco
$result = mysqli_query($conexao, $queryInsert);

if (!$result) {
  echo "O e-mail informado já está cadastrado!";
  exit();
} else {
  header('Location: index.php');
  exit();
}