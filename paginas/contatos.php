<?php
    require('../pacoteDAO/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel = "stylesheet" href = "../css/styleContatos.css"/>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src = "../js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
        <script src = "js/jquery.js"></script>
        <script src = "js/module.js"></script>
    </head>
    <body>
        <div id = "caixa">
            <form method = "get">
                <p> Nome: </p>
                <input name = "nome" required class = "text" maxlength = "80" placeholder = "Ex: ">
                <p> Telefone: </p>
                <input name = "telefone" class = "text" maxlength = "15" minlength = "5" id = "tel">
                <p> Celular: </p>
                <input name = "celular" required class = "text" maxlength = "17"  id = "cel"> 
                <p> Email: </p>
                <input name = "email" required class = "text" maxlength = "80">
                <p> Sua Home Page: </p>
                <input name = "home_page" class = "text" maxlength = "100">
                <p> Link: </p>
                <input name = "link" class = "text" maxlength = "160">
                <select name = "opcoes">
                    <option>Opções de mensagem</option>
                    <option value = "sugestao">Sugestão</option>
                    <option value = "critica">Crítica</option>
                </select>
                <p> Mensagem: </p>
                <textarea name = "mensagem" required class = "text"></textarea>
                <span>M</span><input type = "radio" name = "rd_sexo" value = "M" required>
                <span>F</span><input type = "radio" name = "rd_sexo" value = "F">
                <p> Profissão: </p>
                <input name = "profissao" required class = "text" maxlength = "40">
                <input type = "submit" name = "btn_cadastrar" value = "Cadastrar" id = "button">
            </form>
        </div>
        <script src = "../js/validar.js"></script>
    </body>
</html>