<?php
    
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <title>Frajola´s</title>
        <link rel="icon" type="image/png" href="./img/logo.jpg" />
        <link href="lib/jquery-gallery.css" type="text/css" rel="stylesheet"/>
        <link rel = "stylesheet" href = "../css/style.css">

    </head>
    <body id = "bodyPromocoes">

        <header id = "cabecalho">

            <div id = "logo">
                <img src = "../img/logo.jpg" id = "imglogo" alt = "logo" title = "Logo">
            </div>

            <div id = "menu"> 
                <ul> 
                    <li><a href = "../index.php">Home</a></li>
                    <li>Curiosidades</li>
                    <li>Sobre a Empresa</li>
                    <li>Produto do Mês</li>
                    <li>Filiais</li>
                    <li>Entre em Contato</li>
                </ul>
            </div>

            <form name = "login" method = "post">
                <span id = "txtUsuario"> Usuário:</span> <input name = "usuario" required>
                <span id = "txtSenha"> Senha:</span> <input type = "password" name = "senha" required>
                <input type = submit value = "OK" name = "btnLogin" id = "btn_login">
            </form>

        </header>

        <div class = "menu_vertical">
                <ul> 
                    <li>logo</li>
                    <li>logo</li>
                    <li>logo</li>
                    <li>logo</li>
                </ul>
        </div>

        <div  class = "conteudo">

        <?php

            require('../pacoteDAO/conexao.php');

            $conexao = conexaoMySQL();

            $sql_content =  "SELECT * FROM card_promocao ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_content);

            while($rs = mysqli_fetch_array($select_content)){

        ?>
            <div class = "card">
                <div class = "img_iten" style = "background-image: url(../img/<?php echo($rs['imagem']); ?>);">
                </div>
                    <p> 
                        <span><?php echo($rs['nome_produto']); ?></span><br>
                        <?php echo($rs['descricao']); ?>
                        <br>
                    </p>
                    <span class = "promocao">R$ <?php echo($rs['preco']); ?> </span>
                    <span class = "preco2">R$ <?php @$value = $rs['porcentagem'] * $rs['preco'] / 100; $preco = $rs['preco'] - $value; echo($preco." "."- ".$rs['porcentagem']); ?> </span>
            </div>
            <?php } ?>
    </div>

        <div class = "faInTu">
            <div id = "caixaRedes">
                <div id = "instagram" alt = "instagram" title = "Instagram">
                </div>
                <div id = "facebook"  alt = "facebook" title = "Facebook">
                </div>
                <div id = "twiter"  alt = "twitter" title = "Twitter">
                </div>
            </div>
        </div>

    </body>
    <script src = "../js/function.js" type = "text/javascript"></script>
</html>