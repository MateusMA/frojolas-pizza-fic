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

        <title>Inserir Curiosidades</title>

    </head>

    <body>

        <div id = "formulario">

            <form method = "post" enctype = "multipart/form-data" name = "frmCuriosidade" action = "../pacoteDAO/upload_file.php">

                foto: <input name = "foto" type = "file" required maxLength = "150"/>
                curiosidade: <input name = "curiosidade" required maxLength = "255"/>
                <input type = "submit" name = "btnCriarCur" value = "Cadastrar loja"/>

            </form>

        </div>

        <div id = "formulario2">
            
            <?php
    
                $sql_content =  "SELECT * FROM curiosidades ORDER BY id DESC";
    
                $select_content = mysqli_query($conexao, $sql_content);
    
                while($rs = mysqli_fetch_array($select_content)){
    
            ?>
                <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/editContent.php">
                    
                    <input type = "hidden" value = "<?=$rs['id']?>" name = "id"/>
                    <input value = "<?=$rs['curiosidade']?>" readonly/>
                    <input type = "submit" name = "btnDesativarCuriosidade" value = "Desativar"/>
                    <input type = "submit" name = "btnAtivarCuriosidade" value = "Ativar"/>
    
                </form>
    
            </div>

    </body>

</html>

            <?php }
            
            }
        }?>