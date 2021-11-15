<?php

    require("../pacoteDAO/conexao.php");

    session_start();

    $conexao = conexaoMySql();

    if($_SESSION['$usuario_logado'] != null){
    

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Sistema Interno</title>

    <link rel="stylesheet" href="../css/cms.css" />
    <link rel="stylesheet" href="../css/cms_sessions.css" />
    <script src = "../js/jquery.js"></script>
    <script src = "../js/module.js"></script>
    <script>
            // function obrigatória para o funcionamento do jquery
            // em todos os navegadores

            $(document).ready(function(){

                // function para abrir modal

                $('.visualizar').click(function(){

                    // outros efeitos Ex: toggle, slideToggle

                    $('#container').fadeIn(1000);

                });

                $('#fechar').click(function(){

                    $('#container').fadeOut(1000);

                });

               
            });


             function visualizarDados(idItem){

                $.ajax({

                    type: "POST",

                    url: "../pacoteDAO/modal.php",

                    data: {modo: "visualizar", codigo: idItem},

                    success: function(dados){

                        $('#conteudo_modal').html(dados);

                    }

                });

                }


        </script>

</head>

<body>

    <div id = "container">
            
            <div id = "modal">
                <a href = "#" id = "fechar" style = "color:red; font-size: 20px">X</a>
                <div id = "conteudo_modal"></div>
            </div>

        </div>

    <header>

        <div id="cabecalho">

            <div id="titulo_pagina" alt="logon" title="logon">
                <p><span id="cms">CMS</span> - Sistema De Gerenciamento do Site</p>
            </div>

            <div id="img_titulo">
                <div alt="logon" title="logon" id="img"></div>
            </div>

        </div>

    </header>

    <section id="section1">

        <div class="conteudo">

            <div class="img_content" alt="logon" title="logon" id="img1">
            </div>

            <div class="text_content">
                <p><a href="./cms_content.php" id = "paginas">Adm. Conteúdo</a></p>
            </div>

        </div>

        <div class="conteudo">
            <div class="img_content" alt="logon" title="logon" id="img2">
            </div>

            <div class="text_content">
                <p><a href="./cms_table.php" id = "paginas">Adm. Fale Conosco</a></p>
            </div>
        </div>

        <div class="conteudo">

        </div>

        <div class="conteudo">
            <div class="img_content" alt="logon" title="logon" id="img3">
            </div>

            <div class="text_content">
                <p><a href="./adminUser.php" id = "paginas">Adm. Usuários</a></p>
            </div>
        </div>

        <div id="interacao_user">
            <div>
                Bem vindo: <span><?=$_SESSION['$nome_usuario'];?></span>;
            </div>

            <a href="./loggout.php" id="linka">loggout</a>

        </div>

    </section>
    <section id="section4">
                <h1>Bem Vindo</h1>

    </section>
    <footer>
        <p>Desenvolvedor: Mateus Mendes</p>
    </footer>
</body>

</html>

<?php 
                
    }else
        header("location: ../index.php");
                    
?>