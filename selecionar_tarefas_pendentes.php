<?php

// incluindo a conexao
include('conexao.php');
include('verifica_login.php');

$id_user = $_SESSION['id'];

// guardando o comando em uma variável
$query = "SELECT id_task, title_task, description_task, date_task, time_task FROM task WHERE id_user = '{$id_user}' AND status_task = 'pendente' ORDER BY date_task, time_task ASC";

// enviando o query para o banco
$result = mysqli_query($conexao, $query);

// transformando os dados em um array
$arrayTarefas = mysqli_fetch_assoc($result);

// pegando o número de linhas que o result retornou, para conferir os dados
$i = mysqli_num_rows($result);