<?php 

    require("../pacoteDAO/conexao.php");

    session_start();

    $conexao = conexaoMySql();

    if($_SESSION['$usuario_logado'] != null){

            $sql = "SELECT * FROM acesso_nivel WHERE id = " .$_SESSION['$nivel_usuario'];

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $id_nivel = $rsVisualizar['id'];
                $adm_content = $rsVisualizar['adm_conteudo'];
                
            }



            if($adm_content == 1){



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Sistema Interno</title>

    <link rel="stylesheet" href="../css/cms.css" />
    <link rel="stylesheet" href="../css/cms_sessions.css" />

</head>

<body>

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

    <section id="section2">

        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarCard.php"> Adicionar Card</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarProduto.php"> Adicionar Produto do mês</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarPromocao.php"> Adicionar Promoção</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarSobreEmpresa.php"> Adicionar Sobre a Empresa</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarLojas.php"> Adicionar Lojas</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarCuriosidades.php"> Adicionar Curiosidades</a></p>
            </div>
        </div>
        <div class="content2">
            <div class="img_content2">

            </div>
            <div class="text_content2">
                <p><a href = "../paginas/criarCategoria.php"> Adicionar Categoria</a></p>
            </div>
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