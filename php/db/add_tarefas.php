<?php

// incluindo a conexao
include('./conexao.php'); 

// avisando que estamos trabalhando com o session
session_start();


// guardando os valores inseridos no formuário e de sessões
$title = mysqli_real_escape_string($conexao, $_POST['title']);
$description = mysqli_real_escape_string($conexao, $_POST['description']);
$date = mysqli_real_escape_string($conexao, $_POST['date']);
$time = mysqli_real_escape_string($conexao, $_POST['time']);
$id_user = $_SESSION['id'];

// guardando o comando em uma variável
$query = "INSERT INTO task(title_task, description_task, date_task, time_task, status_task, id_user) VALUES ('{$title}', '{$description}', '{$date}', '{$time}', 'pendente','{$id_user}')";

// enviando o query para o banco
$result = mysqli_query($conexao, $query);

// redirecionando para a dashboard, caso a adição da tarefa for realizada.
// senão, emite mensagem de erro.
if ($result) {
  header('Location: ../../dashboard.php');
} else {
  echo "Ocorreu um erro ao adicionar a tarefa!";
}