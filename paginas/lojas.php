<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produto Mês</title>
        <link rel = "stylesheet" href = "../css/styleLojas.css">
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

            <form name = "login" method = "post">
                <span id = "txtUsuario"> Usuário:</span> <input name = "usuario" required>
                <span id = "txtSenha"> Senha:</span> <input type = "password" name = "senha" required>
                <input type = submit value = "OK" name = "btnLogin" id = "btn_login">
            </form>

        </header>
        <section id="section">
        <?php

            require('../pacoteDAO/conexao.php');

            $conexao = conexaoMySQL();

            $sql_content =  "SELECT * FROM lojas WHERE status = 1 ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_content);

            while($rs = mysqli_fetch_array($select_content)){

            ?>

        <div class="content">
            <div class="img_content" style = "background-image: url(../img/<?php echo($rs['imagem']); ?> ">

            </div>
            <div class="text_content">
                <p> <?= $rs['endereco'] ?> </p>
            </div>
        </div>
        
        </div>
        
    </body>
</html>

            <?php } ?>