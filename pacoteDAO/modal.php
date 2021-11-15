<?php

    if(isset($_POST['modo'])){

        if($_POST['modo'] == 'visualizar'){

            $codigo = $_POST['codigo'];

            require('./conexao.php');

            $conexao = conexaoMySql();

            $sql = "SELECT * FROM tblcontatos WHERE id = $codigo";

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $sexo = $rsVisualizar['sexo'];
                $mensagem = $rsVisualizar['mensagem'];

            }

            echo($nome ."<br>". $telefone ."<br>". $celular);

        }

    }

    if(isset($_POST['modo'])){

        if($_POST['modo'] == 'v'){

            $codigo = $_POST['codigo'];

            require('./conexao.php');

            $conexao = conexaoMySql();

            $sql = "SELECT * FROM card WHERE id = $codigo";

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){

                $imagem = $rsVisualizar['imagem'];
                $nome_produto = $rsVisualizar['nome_produto'];
                $desc = $rsVisualizar['descricao'];
                $preco = $rsVisualizar['preco'];
                $nome_categoria = $rsVisualizar['nome_categoria'];

            }

            echo($nome_produto ."<br>". $nome_categoria ."<br>". $preco);

        }

    }


    ?>