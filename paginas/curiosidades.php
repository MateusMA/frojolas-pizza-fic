<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Curiosidades</title>
        <link rel = "stylesheet" href = "../css/styleCuriosidades.css">
    </head>
    <body>
        <div class = "subtitulo_caixa">
            <h1>Curiosidades</h1>
        </div>
        <?php

            require('../pacoteDAO/conexao.php');

            $conexao = conexaoMySQL();

            $sql_content =  "SELECT * FROM curiosidades WHERE status = 1 ORDER BY id DESC";

            $select_content = mysqli_query($conexao, $sql_content);

            while($rs = mysqli_fetch_array($select_content)){

            ?>
        <div class = "curiosidade">
            <div>
                <p>
                    <?=$rs['curiosidade']?>
                </p>
            </div>
            <div class = "img">
                <div id = "img3" style = "background-image: url(../img/<?php echo($rs['imagem']); ?> ">
                </div>
            </div>
        </div>
        </div>
        
    </body>
</html>

            <?php }?>