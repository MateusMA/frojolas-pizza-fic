<?php

if(isset($_GET['modo'])){

if($_GET['modo']=="excluir"){

    $codigo = $_GET['codigo'];
    $sql = "DELETE FROM tblcontatos WHERE id=".$codigo;

    require('./conexao.php');
    $conexao = conexaoMySql();

    if(mysqli_query($conexao, $sql))
        header('location:../index.php');
    else
        echo("Erro ao exluir");
    
}

}

?>