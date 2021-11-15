<?php

$nome = (string) null;
$telefone = (string) null;
$celular = (string) null;
$email = (string) null;
$opcao = null;
$homePage = (string) null;
$link = null;
$sexo = (string) null;
$mensagem = (string) null;
$profissao = (string) null;

function conexaoMySQL(){

    //$host = "192.168.0.2";
    $host = "127.0.0.1";
    $user = "pc620192";
    $password = "senai127";
    $database = "dbpc620192";

    return $conexao = mysqli_connect($host, $user, $password, $database);
     
}


if(isset($_GET["btn_cadastrar"])){

    $conexao = conexaoMySql();

    $nome = $_GET["nome"];
    $telefone = $_GET["telefone"];
    $celular = $_GET["celular"];
    $email = $_GET["email"];
    $opcao = $_GET["opcoes"];
    $homePage = $_GET["home_page"];
    $link = $_GET["link"];
    $sexo = $_GET["rd_sexo"];
    $mensagem = $_GET["mensagem"];
    $profissao = $_GET["profissao"];

    $insert = "INSERT INTO tblcontatos(nome, telefone, celular, email, opcao, home_page, link, sexo, mensagem, profissao)";

    $values = "VALUES('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$opcao."', '".$homePage."', '".$link."', '".$sexo."', '".$mensagem."', '".$profissao."');";

    $codigoInsert = "".$insert. " " .$values."";

    if(mysqli_query($conexao, $codigoInsert))

        header("location:../index.php");

    else

        echo("<span style = 'color: red; font-size: 50px;'> problemas durante a execução </span>");

};


?>