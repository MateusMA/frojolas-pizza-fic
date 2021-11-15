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

        <title>Inserir Loja</title>

    </head>

    <body>

        <div id = "formulario1">

            <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/upload_file.php">

                foto: <input name = "foto" type = "file" required maxLength = "150"/>
                endereco: <input name = "endereco" required maxLength = "100"/>
                <input type = "submit" name = "btnCriarLoja" value = "Cadastrar loja"/>

            </form>

        </div>

        <div id = "formulario2">
            
        <?php

            $sql_content =  "SELECT * FROM lojas ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_content);

            while($rs = mysqli_fetch_array($select_content)){

        ?>
            <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/editContent.php">
                
                <input type = "hidden" value = "<?=$rs['id']?>" name = "id"/>
                <input value = "<?=$rs['endereco']?>" readonly/>
                <input type = "submit" name = "btnDesativarLoja" value = "Desativar loja"/>
                <input type = "submit" name = "btnAtivarLoja" value = "Ativar loja"/>

            </form>

        </div>

    </body>

</html>

            <?php 
            
            }
        }
            
            
    }?>