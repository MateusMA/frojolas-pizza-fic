<?php 

    require('../pacoteDAO/conexao.php');
    $conexao = conexaoMySQL();

    if(isset($_GET['modo'])){

        $id = $_GET['codigo'];

        $sql_select = "SELECT * FROM usuarios WHERE id=". $id;
        
        $select = mysqli_query($conexao, $sql_select);

        if($rsConsulta = mysqli_fetch_array($select)){

            $user_name = $rsConsulta['user_name'];
            $email = $rsConsulta['email'];
            $status = $rsConsulta['status'];

            }

        if(isset($_POST['btnSalvar'])){

            $user_name_alter = $_POST['nome'];
            $status_alter = $_POST['status'];
            $nivel_alter = $_POST['nivel'];

            //if($user_name != $rs['user_name'] ){}
    
                $sql = "UPDATE usuarios SET user_name = '$user_name_alter', nivel = $nivel_alter, status = $status_alter WHERE id = $id";
    
                $insert = mysqli_query($conexao, $sql);

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Inserir Usuario</title>
    </head>
    <body>

        <section id = 'sessao_user'>

            <div id = 'subtitulo'>
                <h1>Cadastro De Usuário</h1>
            </div>

            <div id = 'container_formulario'>

                <form method = "post">
                    Nome Usuário: <input name = "nome" value = "<?=$user_name?>" required>
                    E-mail: <input name = "email" type = "email" value = "<?=$email?>" readonly>
                    Status: <select name = "status">
                                <option> 1 </option>
                                <option> 0 </option>
                            </select>
                    Nível:  <select name = "nivel" required>

                                <option> escolha um nível </option>

                                <?php 

                                    $sql_nivel =  "SELECT * FROM acesso_nivel ORDER BY id DESC";

                                    $select = mysqli_query($conexao, $sql_nivel);
                    
                                    while($rs = mysqli_fetch_array($select)){
                                
                                ?>
                                    <option> <?=$rs['id'];?> </option>

                                <?php } ?>

                            </select>
                    Alterar Usuário: <input type = "submit" name = "btnSalvar" value = "ALTERAR">
                </form>

            </div>

        </section>

    </body>
</html>