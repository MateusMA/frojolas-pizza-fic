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

        <title>Inserir produto do mês</title>

    </head>

    <body>

        <div id = "formulario">

        <?php
    
            $sql_c =  "SELECT * FROM card ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_c);

            while($rs = mysqli_fetch_array($select_content)){

        ?>

            <form method = "post" enctype = "multipart/form-data" name = "frmProduto" action = "../pacoteDAO/upload_file.php">

                nome: <input name = "nome_produto" readonly value = "<?=$rs['nome_produto']?>" maxLength = "60"/>
                foto: <input name = "foto" type = "file" required maxLength = "150"/>
                curiosidade: <input name = "curiosidade_p1" required maxLength = "100"/>
                curiosidade: <input name = "curiosidade_p2" maxLength = "100"/>
                curiosidade: <input name = "curiosidade_p3" maxLength = "100"/>
                <input type = "submit" name = "btnProduto" value = "Cadastrar produto"/>

            </form>
            <?php } ?>
        </div>

        <div id = "formulario2">
            
            <?php
    
                $sql_content =  "SELECT * FROM produto_mes ORDER BY id DESC";
    
                $select_content = mysqli_query($conexao, $sql_content);
    
                while($rs = mysqli_fetch_array($select_content)){
    
            ?>
                <form method = "post" enctype = "multipart/form-data" name = "frmCard" action = "../pacoteDAO/editContent.php">
                    
                    <input type = "hidden" value = "<?=$rs['id']?>" name = "id"/>
                    <input value = "<?=$rs['nome_produto']?>" readonly/>
                    <input type = "submit" name = "btnDesativarProduto" value = "Desativar"/>
                    <input type = "submit" name = "btnAtivarProduto" value = "Ativar"/>
    
                </form>
    
            </div>
                <?php } ?>

    </body>

</html>

            <?php }
            
            
            }?>