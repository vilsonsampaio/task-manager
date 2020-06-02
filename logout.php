<?php

// avisando que estamos trabalhando com o session
session_start();

// destruindo todas as sessões
session_destroy();

// direcionando para o index.php;
header('Location: index.php');

// caso queira destruir uma sessão específica 
// unset($_SESSION['NOMEDASESSÃO']);
