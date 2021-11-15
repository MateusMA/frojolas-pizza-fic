
<?php 

    require('../pacoteDAO/conexao.php');
    $conexao = conexaoMySQL();

    if(isset($_POST['btn_cadastrar'])){

        $user_name = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $conf_senha = $_POST['conf_senha'];
        $status = $_POST['status'];
        $nivel = $_POST['nivel'];

        //if($user_name != $rs['user_name'] ){}
            
        if($senha === $conf_senha){

            $sql = "INSERT INTO usuarios VALUES(null, '$user_name', AES_ENCRYPT('$senha', 'adminkey'), '$nivel', '$status', '$email')";

            $insert = mysqli_query($conexao, $sql);

        }else{

            echo('Confirme a sua senha novamente');

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
                    Nome Usuário: <input name = "nome" required>
                    E-mail: <input name = "email" type = "email" required>
                    Senha: <input name = "senha" type = "password" required>
                    Confirmar senha: <input name = "conf_senha" type = "password" required>
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
                    Cadastrar Usuário: <input type = "submit" name = "btn_cadastrar" value = "Cadastrar">
                </form>

            </div>

        </section>

    </body>
</html>