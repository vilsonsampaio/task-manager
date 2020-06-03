<?php
include('conexaoteste.php')
?>
 
<html>
    <head>
    <title>Exemplo</title>
</head>
<body>
<?php
    // se o número de resultados for maior que zero, mostra os dados
    if($total > 0) {
        // inicia o loop que vai mostrar todos os dados
        do {
?>
            <p><?php echo $linha['title_task'];?> / <?php echo $linha['date_task'];?></p>
<?php
        // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($dados));
    // fim do if 
    }
?>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>