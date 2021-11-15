<?php

require("./conexao.php");

$conexao = conexaoMySQL();

if(isset($_POST["btnDesativarLoja"])){

    $id = $_POST["id"];
    
    $update = "UPDATE lojas SET status = 0 WHERE id = $id";

    if(mysqli_query($conexao, $update))

        echo("OK");

    else

        echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
    
    }

if(isset($_POST["btnAtivarLoja"])){

        $id = $_POST["id"];
        
        $update = "UPDATE lojas SET status = 1 WHERE id = $id";
    
        if(mysqli_query($conexao, $update))
    
            echo("OK");
    
        else
    
            echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
        
    }

    if(isset($_POST["btnDesativarCuriosidade"])){

        $id = $_POST["id"];
        
        $update = "UPDATE curiosidades SET status = 0 WHERE id = $id";
    
        if(mysqli_query($conexao, $update))
    
            echo("OK");
    
        else
    
            echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
        
        }
    
    if(isset($_POST["btnAtivarCuriosidade"])){
    
            $id = $_POST["id"];
            
            $update = "UPDATE curiosidades SET status = 1 WHERE id = $id";
        
            if(mysqli_query($conexao, $update))
        
                echo("OK");
        
            else
        
                echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            
        }

    if(isset($_POST["btnDesativarSobre"])){

            $id = $_POST["id"];
            
            $update = "UPDATE sobre SET status = 0 WHERE id = $id";
        
            if(mysqli_query($conexao, $update))
        
                echo("OK");
        
            else
        
                echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            
            }
        
    if(isset($_POST["btnAtivarSobre"])){
        
                $id = $_POST["id"];
                
                $update = "UPDATE sobre SET status = 1 WHERE id = $id";
            
                if(mysqli_query($conexao, $update))
            
                    echo("OK");
            
                else
            
                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                
         }

         if(isset($_POST["btnDesativarCard"])){

            $id = $_POST["id"];
            
            $update = "UPDATE card SET status = 0 WHERE id = $id";
        
            if(mysqli_query($conexao, $update))
        
                echo("OK");
        
            else
        
                echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
            
            }
        
        if(isset($_POST["btnAtivarCard"])){
        
                $id = $_POST["id"];
                
                $update = "UPDATE card SET status = 1 WHERE id = $id";
            
                if(mysqli_query($conexao, $update))
            
                    echo("OK");
            
                else
            
                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                
            }
            if(isset($_POST["btnDesativarPromo"])){

                $id = $_POST["id"];
                
                $update = "UPDATE card_promocao SET status = 0 WHERE id = $id";
            
                if(mysqli_query($conexao, $update))
            
                    echo("OK");
            
                else
            
                    echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                
                }
            
            if(isset($_POST["btnAtivarPromo"])){
            
                    $id = $_POST["id"];
                    
                    $update = "UPDATE card_promocao SET status = 1 WHERE id = $id";
                
                    if(mysqli_query($conexao, $update))
                
                        echo("OK");
                
                    else
                
                        echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                    
                }
                if(isset($_POST["btnDesativarProduto"])){

                    $id = $_POST["id"];
                    
                    $update = "UPDATE produto_mes SET status = 0 WHERE id = $id";
                
                    if(mysqli_query($conexao, $update))
                
                        echo("OK");
                
                    else
                
                        echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                    
                    }
                
                if(isset($_POST["btnAtivarProduto"])){
                
                        $id = $_POST["id"];
                        
                        $update = "UPDATE produto_mes SET status = 1 WHERE id = $id";
                    
                        if(mysqli_query($conexao, $update))
                    
                            echo("OK");
                    
                        else
                    
                            echo("<span style = 'color: red; font-size: 200px;'> problemas durante a execução </span>");
                        
                    }

?>