<?php

// incluindo a conexao
include('./conexao.php');

// avisando que estamos trabalhando com o session
session_start();

// guardando os valores inseridos no formuário
$id_user = $_SESSION['id'];
$id_task = $_GET['id_task'];

// guardando o comando em uma variável
$query = "DELETE FROM task WHERE id_user = '{$id_user}' AND id_task = '{$id_task}'";
echo $query;


// enviando o query para o banco
$result = mysqli_query($conexao, $query);

if ($result) {
  header('Location: ../../dashboard.php');
} else {
  echo "Ocorreu um erro ao deletar a tarefa!";
}