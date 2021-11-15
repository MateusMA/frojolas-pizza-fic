<?php 
    require("../pacoteDAO/conexao.php");

    session_start();

    $conexao = conexaoMySql();

    if($_SESSION['$usuario_logado'] != null){

            $sql = "SELECT * FROM acesso_nivel WHERE id = " .$_SESSION['$nivel_usuario'];

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $id_nivel = $rsVisualizar['id'];
                $adm_user = $rsVisualizar['adm_user'];
                
            }



            if($adm_user == 1){



?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <title>Admin Usuarios</title>
        <link rel="stylesheet" href="../css/cms.css" />
        <link rel="stylesheet" href="../css/cms_sessions.css" />
        <script src = "../js/usuario.js"></script>
        <script src="../lib/jquery-3.4.1.js"></script>

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
    <section id="section5">

        <div id="table">

            <h2> ADMINISTRAÇÃO DE USUÁRIOS </h2>

            <div class="subtitulo_adm">
                Nome
            </div>
            <div class="subtitulo_adm">
                Nivel
            </div>
            <div class="subtitulo_adm">
                Status
            </div>
            <div class="subtitulo_adm">
                Opcoes
            </div>

            <?php 

                $sql_users =  "SELECT * FROM usuarios ORDER BY id DESC";

                $select_users = mysqli_query($conexao, $sql_users);

                while($rs = mysqli_fetch_array($select_users)){
                    
            ?>

            <div class="conteudo_tabela_adm">
                <?php echo($rs['user_name']); ?>
            </div>
            <div class="conteudo_tabela_adm">
                <?php echo($rs['nivel']); ?>
            </div>
            <div class="conteudo_tabela_adm">
                <?php echo($rs['status']); ?>
            </div>
            </div>

            <div class="conteudo_tabela_adm">
                
                <a onclick = "return confirm('Deseja Realmente Excluir o Usuário Porra!?')" href = "../pacoteDAO/delete_usuario.php?modo=excluir&codigo=<?=$rs['id'];?>"> <img src = "../img/deleteicon.png"/> </a>
                <a href = "#" onclick = "visualizarUser(<?=$rs['id'];?>);"> <img src = "../img/viewicon.png"/> </a>
                <a href = "../paginas/editUser.php?modo=editar&codigo=<?=$rs['id'];?>"> <img src = "../img/editicon.png"/> </a>
                <?php if($rs['status'] == 1){?>
                    <a href = "../paginas/editUser.php?modo=editar&codigo=<?=$rs['id'];?>"> Ativado </a>
                <?php } ?>
                <?php if($rs['status'] == 0){?>
                    <a href = "../paginas/editUser.php?modo=editar&codigo=<?=$rs['id'];?>"> Desativado </a>
                <?php } ?>
            </div>
                <?php } ?>
        </div>
            
        <div>
            <a href = "../paginas/inserirUser.php"> Novo Usuário </a>
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