<?php

    $nivel = 0;
    $status = 0;
    $nome = null;

    if(isset($_POST['btnLogin'])){

            require("conexao.php");

            $nome = $_POST['usuario'];
            $senha = $_POST['senha'];

            $conexao = conexaoMySQL();

// SELECT u.*, an.* FROM usuarios u INNER JOIN acesso_nivel an ON u.nivel = an.id
// WHERE u.user_name = '$nome' AND u.senha = AES_ENCRYPT('$senha','adminkey') AND u.status = 1 limit 1";

            $sql = "SELECT * FROM usuarios WHERE user_name = '$nome' AND senha = AES_ENCRYPT('$senha','adminkey') AND status = 1 limit 1";

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $nome = $rsVisualizar['user_name'];
                $nivel = $rsVisualizar['nivel'];
                $email = $rsVisualizar['email'];
                $status = $rsVisualizar['status'];

                session_start();

                $_SESSION['$usuario_logado'] = $rsVisualizar['id'];
                $_SESSION['$nome_usuario'] = $nome;
                $_SESSION['$nivel_usuario'] = $nivel;
                
            }
        
            if($nivel > 0){

                header("location: ./cms/home_cms.php");

            }else{
                
                echo("<p style = 'color: red; font-size: 30px; margin-left: 500px; max-height: 0px'>Usuário ou Senha incorretos!</p>");
            }

        }


?>
