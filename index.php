<?php

    require('./pacoteDAO/select.php');
    require('./pacoteDAO/conexao.php');

    if(isset($_GET['tag'])){

        $tag = $_GET['tag'];
    
        $sql_content = "SELECT * FROM card WHERE nome_categoria = '$tag' AND status = 1";
    
    }else{
    
        $sql_content =  "SELECT * FROM card WHERE status = 1 ORDER BY RAND()";
    
    }

    $conexao = conexaoMySQL();
   
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <title>Frajola´s</title>
        <link rel="icon" type="image/png" href="./img/logo.jpg" />
        <link href="lib/jquery-gallery.css" type="text/css" rel="stylesheet"/>
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "./js/jquery.js"></script>
        <script src = "./js/module.js"></script>
        <script>
            // function obrigatória para o funcionamento do jquery
            // em todos os navegadores

            $(document).ready(function(){

                // function para abrir modal

                $('.visualizar').click(function(){

                    // outros efeitos Ex: toggle, slideToggle

                    $('#container').fadeIn(1000);

                });

                $('#fechar').click(function(){

                    $('#container').fadeOut(1000);

                });

               
            });


             function visualizarDados(idItem){

                $.ajax({

                    type: "POST",

                    url: "./pacoteDAO/modal.php",

                    data: {modo: "v", codigo: idItem},

                    success: function(dados){

                        $('#conteudo_modal').html(dados);

                    }

                });

                }


        </script>

    </head>
    <body>

    <div id = "container">
            
            <div id = "modal">
                <a href = "#" id = "fechar" style = "color:red; font-size: 20px">X</a>
                <div id = "conteudo_modal"></div>
            </div>

        </div>

        <header id = "cabecalho">

            <div id = "logo">
                <img src = "img/logo.jpg" id = "imglogo" alt = "logo" title = "Logo">
            </div>

            <div id = "menu"> 
                <ul> 
                    <li><a href = "./paginas/curiosidades.php">Curiosidades</a></li>
                    <li><a href = "./paginas/sobre.php">Sobre a Empresa</a></li>
                    <li><a href = "./paginas/produtomes.php">Produto do Mês</a></li>
                    <li><a href = "./paginas/promocoes.php">Promoções</a></li>
                    <li><a href = "./paginas/lojas.php">Lojas</a></li>
                    <li><a href = "./paginas/contatos.php">Entre em Contato</a></li>
                </ul>
            </div>

            <form name = "login" method = "post">
                <span id = "txtUsuario">Usuário:</span><input name = "usuario" required>
                <span id = "txtSenha">Senha:</span><input type = "password" name = "senha" required>
                <input type = submit value = "OK" name = "btnLogin" id = "btn_login">
            </form>

        </header>

        <ul class="gallery-slideshow">
            <li><img src="./img/pizza4.jpg?raw=true"/></li>
            <li><img src="./img/pizza.png?raw=true"/></li>
            <li><img src="./img/sl.png?raw=true"/></li>
        </ul>

        

        <div class = "menu_vertical">
                <ul> 
                    <?php

                        $sql_Ctipo =  "SELECT DISTINCT tipo_categoria FROM categorias";

                        $select_content = mysqli_query($conexao, $sql_Ctipo);

                        while($rs_content = mysqli_fetch_array($select_content)){

                    ?>

                    <li class = "menu_itens"><?=$rs_content['tipo_categoria']?>
                        <ul class = "submenu">
                        <?php

                            $tipo = $rs_content['tipo_categoria'];

                            $sql_categoria =  "SELECT DISTINCT nome_categoria FROM categorias WHERE tipo_categoria = '$tipo'";

                            $select_categoria = mysqli_query($conexao, $sql_categoria);

                            while($rs_categoria = mysqli_fetch_array($select_categoria)){
                        
                        ?>
                                <a href = "./index.php?tag=<?=$rs_categoria['nome_categoria']?>"><li class = "submenu_itens">
                                
                                        <?=$rs_categoria['nome_categoria']?>

                                </li></a>

                            <?php } ?>
                        </ul>

                    </li>
                    <?php } ?>
                    <a id = "todos" href = "./index.php"><li class = "submenu_itens">Todos os produtos</li></a>
                </ul>
        </div>
        
        
        <div  class = "conteudo">

        <?php

        $select_content = mysqli_query($conexao, $sql_content);

        while($rs = mysqli_fetch_array($select_content)){

        ?>
            <div class = "card">
                <div class = "img_iten" style = "background-image: url(./img/<?php echo($rs['imagem']); ?>);">
                </div>
                    <p> 
                        <span><?php echo($rs['nome_produto']); ?></span><br>
                        <?php echo($rs['descricao']); ?>
                        <br>
                    </p>
                    <h2 class = "preco">R$ <?php echo($rs['preco']); ?> </h2>
                    <button><a href = "#" class = "visualizar" onclick = "visualizarDados(<?=$rs['id'];?>);"> Detalhes: </a></button>
                    
            </div>

        <?php } ?>
        </div>
    </div> 

        <div class = "faInTu">
            <div id = "caixaRedes">
                <div id = "instagram" alt = "instagram" title = "Instagram">
                </div>
                <div id = "facebook"  alt = "facebook" title = "Facebook">
                </div>
                <div id = "twiter"  alt = "twitter" title = "Twitter">
                </div>
            </div>
        </div>

        <footer id = "rodape">
            <div id = "subtituloRodape">
                <div>
                    Sistema interno
                </div>
            </div>
            <div id = "txtEndereco">
                Endereço: São Paulo, Av. Luis Carlos Berrini, nº 666, telefone: (11) 2121-7839
            </div>
            <div id = "imgApk">
                
            </div>
            <div id = "btnApk">
                <button> Baixar APK </button>
            </div>
        </footer>

    </body>
    <script src = "lib/jquery-3.4.1.js" type = "text/javascript"></script><br>
    <script src= "lib/jquery-gallery.js" type = "text/javascript"></script><br>
    <script src = "js/function.js" type = "text/javascript"></script>
    <script src = "js/index.js" type = "text/javascript"></script>
</html>