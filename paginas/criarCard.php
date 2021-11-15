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

        <title>Inserir Card</title>

    </head>

    <body>

        <div id = "formulario">

            <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/upload_file.php">

                nome do produto: <input name = "nome_produto" required maxLength = "60"/>
                foto: <input name = "foto" type = "file" required maxLength = "150"/>
                descricao: <input name = "descricao" required maxLength = "100"/>
               
                categoria: <select name = "categoria">
                            <?php 

                            $sql_c =  "SELECT * FROM categorias ORDER BY id DESC";

                            $select = mysqli_query($conexao, $sql_c);

                            while($rs = mysqli_fetch_array($select)){

                            ?>
                                <option> <?=$rs['nome_categoria'];?> </option>

                                <?php } ?>

                            </select>
                preço: <input name = "preco" required placeholder = "100.00" maxLength = "6"/>
                <input type = "submit" name = "btnCriar" value = "Cadastrar produto"/>

            </form>

        </div>

        <div id = "formulario2">
            
            <?php
    
                $sql_content =  "SELECT * FROM card ORDER BY id DESC";
    
                $select_content = mysqli_query($conexao, $sql_content);
    
                while($rs = mysqli_fetch_array($select_content)){
    
            ?>
                <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/editContent.php">
                    
                    <input type = "hidden" value = "<?=$rs['id']?>" name = "id"/>
                    <input value = "<?=$rs['nome_produto']?>" readonly/>
                    <input type = "submit" name = "btnDesativarCard" value = "Desativar"/>
                    <input type = "submit" name = "btnAtivarCard" value = "Ativar"/>
    
                </form>
    
            </div>
                <?php } ?>
    </body>

</html>

            <?php }
            
            
            }?>