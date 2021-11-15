<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produto Mês</title>
        <link rel = "stylesheet" href = "../css/styleMes.css">
    </head>
    <body>
        <header id = "cabecalho">

            <div id = "logo">
                <img src = "../img/logo.jpg" id = "imglogo" alt = "logo" title = "Logo">
            </div>

            <div id = "menu"> 
                <ul> 
                    <li><a href = "./paginas/curiosidades.php">Curiosidades</a></li>
                    <li>Sobre a Empresa</li>
                    <li>Produto do Mês</li>
                    <li><a href = "./paginas/promocoes.php">Promoções</a></li>
                    <li>Nossas Lojas</li>
                    <li><a href = "./paginas/contatos.php">Entre em Contato</a></li>
                </ul>
            </div>

        </header>

        <?php

        require('../pacoteDAO/conexao.php');

        $conexao = conexaoMySQL();

        $sql_content =  "SELECT * FROM produto_mes  WHERE status = 1 ORDER BY id DESC limit 1";

        $select_content = mysqli_query($conexao, $sql_content);

        while($rs = mysqli_fetch_array($select_content)){

        ?>

        <div id = "columm">
        <div id =  "descricao">
                    <p> <span><?php echo($rs['nome_produto']); ?></span><br>
                        <?php echo($rs['curiosidade_p1']); ?>
                        <?php echo($rs['curiosidade_p1']); ?>
                        <?php echo($rs['curiosidade_p1']); ?>
                        <br>
                    </p>
        </div>
        <div id = "imagem" style = "background-image: url(../img/<?php echo($rs['imagem']); ?>);">
        </div>
        </div>
            <?php } ?>
    </body>
</html>