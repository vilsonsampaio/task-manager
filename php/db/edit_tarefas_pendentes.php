<?php

// incluindo a conexao
include('./conexao.php');

// avisando que estamos trabalhando com o session
session_start();

// guardando os valores da sessão e os passados por parâmetro
$id_user = $_SESSION['id'];
$id_task = $_GET['id_task'];

// guardando o comando em uma variável
$query = "UPDATE task SET status_task = 'concluida' WHERE id_user = '{$id_user}' AND id_task = '{$id_task}'";

// enviando o query para o banco
$result = mysqli_query($conexao, $query);

// redirecionando para a dashboard, caso a troca do status da tarefa for realizada.
// senão, emite mensagem de erro.
if ($result) {
  header('Location: ../../dashboard.php');
} else {
  echo "Ocorreu um erro ao trocar o status a tarefa!";
}