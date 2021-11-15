<?php

    require("../pacoteDAO/conexao.php");

    session_start();

    $conexao = conexaoMySql();

    if($_SESSION['$usuario_logado'] != null){

            $sql = "SELECT * FROM acesso_nivel WHERE id = " .$_SESSION['$nivel_usuario'];

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $id_nivel = $rsVisualizar['id'];
                $adm_fale = $rsVisualizar['adm_fale'];
                
            }



            if($adm_fale == 1){
    

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
    <div>   
            Filtro: <select name = "filtro">

            <option value = "todos"> Sugestão/Critica </option> 
            <option value = "sugestao"> Sugestão </option>
            <option value = "critica"> Critica </option>
    
            </select> 
    </div>
    <section id="section3">

        <div id="table">

            <h2> ADMINISTRAÇÃO DE MENSAGENS </h2>

            <div class="subtitulo">
                Nome
            </div>
            <div class="subtitulo">
                Telefone
            </div>
            <div class="subtitulo">
                Celular
            </div>
            <div class="subtitulo">
                Tipo
            </div>
            <div class="subtitulo">
                Mensagem
            </div>
            <div class="subtitulo">
                Opções
            </div>

            <?php 

                $sql =  "SELECT * FROM tblcontatos ORDER BY id DESC";

                $select = mysqli_query($conexao, $sql);

                while($rs = mysqli_fetch_array($select)){
                    
            ?>

            <div class="conteudo_tabela">
                <?php echo($rs['nome']); ?>
            </div>
            <div class="conteudo_tabela">
                <?php echo($rs['telefone']); ?>
            </div>
            <div class="conteudo_tabela">
                <?php echo($rs['celular']); ?>
            </div>
            <div class="conteudo_tabela">
                <?php echo($rs['opcao']); ?>
            </div>
            <div class="conteudo_tabela">
                <?php echo($rs['mensagem']); ?>
            </div>

            <div class="conteudo_tabela">
                
                <a onclick = "return confirm('Deseja Realmente Excluir o Registro Porra!?')" href = "../pacoteDAO/delete.php?modo=excluir&codigo=<?=$rs['id'];?>"> <img src = "../img/deleteicon.png"/> </a>
                <a href = "#" class = "visualizar" onclick = "visualizarDados(<?=$rs['id'];?>);"> <img src = "../img/viewicon.png"/> </a>
                
            </div>
                <?php } ?>
        </div>

    </section>
    <footer>
        <p>Desenvolvedor: Mateus Mendes</p>
    </footer>
</body>

</html>

<?php 
                
        }else
            header("location: ./home_cms.php");
    }else
        header("location: ../index.php");
                    
?>