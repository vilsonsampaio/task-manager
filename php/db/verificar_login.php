<?php

// avisando que estamos trabalhando com o session
session_start();

// Caso o usuário não seja logado, redireciona para o index
if (!$_SESSION['nome']) {
  header('Location: index.php');
  exit();  
} 