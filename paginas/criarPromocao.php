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

        <title>Inserir Card de Promoção</title>

    </head>

    <body>

        <div id = "formulario">

            <?php


                $sql_content =  "SELECT * FROM card ORDER BY id DESC";

                $select_content = mysqli_query($conexao, $sql_content);

                while($rs = mysqli_fetch_array($select_content)){

            ?>

            <form method = "post" name = "frmCard" action = "../pacoteDAO/upload_file.php">

                nome do produto: <input name = "nome_produto" required maxLength = "60" value = "<?=$rs["nome_produto"]?>" readonly/>
                foto: <input name = "foto" required maxLength = "150" value = "<?=$rs["imagem"]?>" readonly/>
                descricao: <input name = "descricao" required maxLength = "100" value = "<?=$rs["descricao"]?>" readonly/>
                preço: <input name = "preco" required placeholder = "100.00" maxLength = "6" value = "<?=$rs["preco"]?>" readonly/>
                categoria: <input name = "categoria" required maxLength = "80" value = "<?=$rs["nome_categoria"]?>" readonly/>
                promoção: <select name = "preco_novo">
                            <option>10%</option>
                            <option>20%</option>
                            <option>30%</option>
                            <option>40%</option>
                            <option>50%</option>
                            <option>60%</option>
                            <option>70%</option>
                            <option>80%</option>
                            <option>90%</option>
                            <option>100%</option>
                        </select>
                <input type = "submit" name = "btnCriarPromo" value = "Cadastrar produto"/>
                
            </form>

            <?php } ?>
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
                    <input type = "submit" name = "btnDesativarPromo" value = "Desativar"/>
                    <input type = "submit" name = "btnAtivarPromo" value = "Ativar"/>
    
                </form>
    
            </div>
                <?php } ?>

    </body>

</html>

            <?php }
            
            
            }?>