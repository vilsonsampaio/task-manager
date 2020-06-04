<?php

// incluindo a conexao
include('./conexao.php');

// avisando que estamos trabalhando com o session
session_start();

// guardando os valores inseridos no formuário
$title = mysqli_real_escape_string($conexao, $_POST['title']);
$description = mysqli_real_escape_string($conexao, $_POST['description']);
$date = mysqli_real_escape_string($conexao, $_POST['date']);
$time = mysqli_real_escape_string($conexao, $_POST['time']);
$id_user = $_SESSION['id'];
$id_task = mysqli_real_escape_string($conexao, $_POST['id_task']);

// guardando o comando em uma variável
$query = "UPDATE task SET title_task = '{$title}', description_task = '{$description}', date_task = '{$date}', time_task = '{$time}' WHERE id_user = '{$id_user}' AND id_task = '{$id_task}'";
echo $query;


// enviando o query para o banco
$result = mysqli_query($conexao, $query);

if ($result) {
  header('Location: ../../dashboard.php');
} else {
  echo "Ocorreu um erro ao atualizar a tarefa!";
}