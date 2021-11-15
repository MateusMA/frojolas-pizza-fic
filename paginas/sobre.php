<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sobre a Empresa</title>
        <link rel = "stylesheet" href = "../css/styleSobre.css">
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

        <div id = "descricao">
            <?php

                require('../pacoteDAO/conexao.php');

                $conexao = conexaoMySQL();

                $sql_content =  "SELECT * FROM sobre WHERE status = 1 ORDER BY id DESC";

                $select_content = mysqli_query($conexao, $sql_content);

                while($rs = mysqli_fetch_array($select_content)){

            ?>
            <p>
                <?=$rs['paragrafo_1']?>
            </p>
            <p>
                <?=$rs['paragrafo_2']?>
            </p>
            <p>
                <?=$rs['paragrafo_3']?>
            </p>
            <p>
                <?=$rs['paragrafo_4']?>
            </p>
                <?php }?>
        </div>
    </body>
</html>