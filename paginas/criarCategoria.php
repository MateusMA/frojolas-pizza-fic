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

        <title>Inserir Categoria</title>

    </head>

    <body>

        <div id = "formulario">

            <form method = "post"  name = "frmCard" action = "../pacoteDAO/upload_file.php">

                tipo: <select name = "tipo">
                        <option>Pizza Salgada</option>
                        <option>Pizza Doce</option>
                        <option>Pizza Com Bordas Especiais</option>
                    </select>
                nome da categoria: <input name = "categoria" required maxLength = "150">
                <input type = "submit" name = "btnCriarCategoria" value = "Cadastrar categoria"/>

            </form>

        </div>

    </body>

</html>

    <?php }
            
            
    }?>