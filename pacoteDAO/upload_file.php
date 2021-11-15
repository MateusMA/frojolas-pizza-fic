<?php 

require("../constants/constants.php");
require("./conexao.php");

$nome_produto = (string) null;
$descricao = (string) null;
$preco = (string) null;
$curiosidade_p1 = null;
$curiosidade_p2 = null;
$curiosidade_p3 = null;
$paragragfo_2 = null;
$paragragfo_3 = null;
$paragragfo_4 = null;

$conexao = conexaoMySQL();

if(isset($_POST["btnCriar"])){

    $nome_produto = $_POST["nome_produto"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];

    $tipo_arquivo = $_FILES["foto"]['type'];

    if(in_array($tipo_arquivo, $arquivos_permitidos)){

        $tamanho_arq = round($_FILES["foto"]['size']/1024);

        if($tamanho_arq <= $tamanho_perm){

            $nome_arq_origin = $_FILES["foto"]['name'];

            $nome_arq_no_ext = pathinfo($nome_arq_origin, PATHINFO_FILENAME);
            $nome_arq_ext = pathinfo($nome_arq_origin, PATHINFO_EXTENSION);

            $nome_encrypt = md5(uniqid(time()).$nome_arq_no_ext);

            $nome_arquivo = $nome_encrypt. "." .$nome_arq_ext;

            $arquivo_tmp = $_FILES["foto"]['tmp_name'];

            if(move_uploaded_file($arquivo_tmp, $diretorio.$nome_arquivo)){

                $insert = "INSERT INTO card(imagem, nome_produto, descricao, preco, nome_categoria) ";
                $values = "VALUES('".$nome_arquivo."','".$nome_produto."','".$descricao."',".$preco.",'".$categoria."');";
                $codigoInsert = "".$insert. " " .$values."";

                if(mysqli_query($conexao, $codigoInsert))
                    echo($nome_arquivo);
                else
                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            }

            

        }else{

            echo("muito grande, eu não aguento");

        }
    
    }

}

if(isset($_POST["btnProduto"])){

    $nome_produto = $_POST["nome_produto"];
    $curiosidade_p1 = $_POST["curiosidade_p1"];
    $curiosidade_p2 = $_POST["curiosidade_p2"];
    $curiosidade_p3 = $_POST["curiosidade_p3"];

    $tipo_arquivo = $_FILES["foto"]['type'];

    if(in_array($tipo_arquivo, $arquivos_permitidos)){

        $tamanho_arq = round($_FILES["foto"]['size']/1024);

        if($tamanho_arq <= $tamanho_perm){

            $nome_arq_origin = $_FILES["foto"]['name'];

            $nome_arq_no_ext = pathinfo($nome_arq_origin, PATHINFO_FILENAME);
            $nome_arq_ext = pathinfo($nome_arq_origin, PATHINFO_EXTENSION);

            $nome_encrypt = md5(uniqid(time()).$nome_arq_no_ext);

            $nome_arquivo = $nome_encrypt. "." .$nome_arq_ext;

            $arquivo_tmp = $_FILES["foto"]['tmp_name'];

            if(move_uploaded_file($arquivo_tmp, $diretorio.$nome_arquivo)){

                $insert = "INSERT INTO produto_mes(imagem, nome_produto, curiosidade_p1, curiosidade_p2, curiosidade_p3) ";
                $values = "VALUES('".$nome_arquivo."','".$nome_produto."','".$curiosidade_p1."','".$curiosidade_p2."','".$curiosidade_p3."');";
                $codigoInsert = "".$insert. " " .$values."";

                $codigoDelete = "DELETE FROM produto_mes WHERE id >= 1";

                if(mysqli_query($conexao, $codigoDelete)){

                    if(mysqli_query($conexao, $codigoInsert))
                    echo($nome_arquivo);

                }else

                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");

                }
                
            }

            

        }else{

            echo("muito grande, eu não aguento");

        }
    
    }

    if(isset($_POST["btnCriarPromo"])){

        $nome_produto = $_POST["nome_produto"];
        $descricao = $_POST["descricao"];
        $nome_arquivo = $_POST["foto"];
        $preco = $_POST["preco"];
        $preco_novo = $_POST["preco_novo"];
        $categoria = $_POST["categoria"];

        $insert = "INSERT INTO card_promocao(imagem, nome_produto, descricao, preco, porcentagem, nome_categoria) ";
        $values = "VALUES ('".$nome_arquivo."','".$nome_produto."','".$descricao."', ".$preco.", '".$preco_novo."', '".$categoria."');";
        $codigoInsert = "".$insert. " " .$values."";

        if(mysqli_query($conexao, $codigoInsert))
            echo($nome_arquivo);
        else
            echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            }

    if(isset($_POST["btnCriarSobre"])){

        $paragrafo_1 = $_POST["paragrafo_1"];
        $paragrafo_2 = $_POST["paragrafo_2"];
        $paragrafo_3 = $_POST["paragrafo_3"];
        $paragrafo_4 = $_POST["paragrafo_4"];
        
        $insert = "INSERT INTO sobre(paragrafo_1, paragrafo_2, paragrafo_3, paragrafo_4) ";
        $values = "VALUES('$paragrafo_1', '$paragrafo_2', '$paragrafo_3', '$paragrafo_4');";
        $codigoInsert = "".$insert. " " .$values."";

        if(mysqli_query($conexao, $codigoInsert))

            echo("OK");

        else

            //echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            echo($codigoInsert);
        }
        
    if(isset($_POST["btnCriarLoja"])){

        $endereco = $_POST["endereco"];

        $tipo_arquivo = $_FILES["foto"]['type'];

        if(in_array($tipo_arquivo, $arquivos_permitidos)){

            $tamanho_arq = round($_FILES["foto"]['size']/1024);

            if($tamanho_arq <= $tamanho_perm){

                $nome_arq_origin = $_FILES["foto"]['name'];

                $nome_arq_no_ext = pathinfo($nome_arq_origin, PATHINFO_FILENAME);
                $nome_arq_ext = pathinfo($nome_arq_origin, PATHINFO_EXTENSION);

                $nome_encrypt = md5(uniqid(time()).$nome_arq_no_ext);

                $nome_arquivo = $nome_encrypt. "." .$nome_arq_ext;

                $arquivo_tmp = $_FILES["foto"]['tmp_name'];

                if(move_uploaded_file($arquivo_tmp, $diretorio.$nome_arquivo)){

                    $insert = "INSERT INTO lojas(imagem, endereco) ";
                    $values = "VALUES('".$nome_arquivo."','".$endereco."');";
                    $codigoInsert = "".$insert. " " .$values."";

                    if(mysqli_query($conexao, $codigoInsert))
                        echo($nome_arquivo);
                    else
                        echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                }

                

            }else{

                echo("muito grande, eu não aguento");

            }
        
        }

}

if(isset($_POST["btnCriarCur"])){

    $curiosidade = $_POST["curiosidade"];

    $tipo_arquivo = $_FILES["foto"]['type'];

    if(in_array($tipo_arquivo, $arquivos_permitidos)){

        $tamanho_arq = round($_FILES["foto"]['size']/1024);

        if($tamanho_arq <= $tamanho_perm){

            $nome_arq_origin = $_FILES["foto"]['name'];

            $nome_arq_no_ext = pathinfo($nome_arq_origin, PATHINFO_FILENAME);
            $nome_arq_ext = pathinfo($nome_arq_origin, PATHINFO_EXTENSION);

            $nome_encrypt = md5(uniqid(time()).$nome_arq_no_ext);

            $nome_arquivo = $nome_encrypt. "." .$nome_arq_ext;

            $arquivo_tmp = $_FILES["foto"]['tmp_name'];

            if(move_uploaded_file($arquivo_tmp, $diretorio.$nome_arquivo)){

                $insert = "INSERT INTO curiosidades(imagem, curiosidade) ";
                $values = "VALUES('".$nome_arquivo."','".$curiosidade."');";
                $codigoInsert = "".$insert. " " .$values."";

                if(mysqli_query($conexao, $codigoInsert))
                    echo($nome_arquivo);
                else
                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            }

            

        }else{

            echo("muito grande, eu não aguento");

        }
    
    }

}

if(isset($_POST["btnCriarCategoria"])){

    $categoria = $_POST["categoria"];
    $tipo = $_POST["tipo"];

    $insert = "INSERT INTO categorias(tipo_categoria, nome_categoria) ";
    $values = "VALUES('".$tipo."','".$categoria."');";
    $codigoInsert = "".$insert. " " .$values."";

    if(mysqli_query($conexao, $codigoInsert))

        echo"Ok Google";

    else
    
        echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");

}

?>