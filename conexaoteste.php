<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'taskmanager');

$con = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

session_start();
$id_user = $_SESSION['id'];

// guardando o comando em uma variável
$query = "SELECT title_task, date_task FROM task WHERE id_user = '{$id_user}' and status_task = 'pendente'";
echo $query;
// executa a query
$dados = mysqli_query( $con, $query);
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);