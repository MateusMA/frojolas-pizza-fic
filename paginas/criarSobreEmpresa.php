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

        <title>Inserir Sobre a empresa</title>

    </head>

    <body>

        <div id = "formulario">

            <form method = "post" name = "frmSobre" action = "../pacoteDAO/upload_file.php">

                paragrafo_1: <input name = "paragrafo_1" required maxLength = "230"/>
                paragrafo_2: <input name = "paragrafo_2" required maxLength = "230"/>
                paragrafo_3: <input name = "paragrafo_3" required maxLength = "230"/>
                paragrafo_4: <input name = "paragrafo_4" required maxLength = "230"/>
                <input type = "submit" name = "btnCriarSobre" value = "Cadastrar produto"/>

            </form>

        </div>

        <div id = "formulario2">
            
        <?php

            $sql_content =  "SELECT * FROM sobre ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_content);

            while($rs = mysqli_fetch_array($select_content)){

        ?>
            <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/editContent.php">
                
                <input type = "hidden" value = "<?=$rs['id']?>" name = "id"/>
                <input value = "<?=$rs['paragrafo_1']?>" readonly/>
                <input type = "submit" name = "btnDesativarSobre" value = "Desativar"/>
                <input type = "submit" name = "btnAtivarSobre" value = "Ativar"/>

            </form>

        </div>
    </body>

</html>

    <?php }
              
    }     
    
}?>