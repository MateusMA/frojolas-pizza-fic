<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Inserir Nível</title>
    </head>
    <body>

        <section id = 'sessao_nivel'>

            <div id = 'subtitulo'>
                <h1>Cadastro De Nível</h1>
            </div>

            <div id = 'container_formulario'>

                <form method = "post">
                    Nome: <input name = "nome" required>
                    Descricao: <input name = "nome" required>
                    Adm. Conteudo:  <select name = "adm_conteudo">
                                        <option> 0 </option>
                                        <option> 1 </option>
                                    </select>
                    Adm. Conteudo:  <select name = "adm_fale">
                                        <option> 0 </option>
                                        <option> 1 </option>
                                    </select>
                    Adm. Conteudo:  <select name = "adm_user">
                                        <option> 0 </option>
                                        <option> 1 </option>
                                    </select>
                    Criar Nível: <input type = "submit" name = "btn_criar" value = "Criar">
                </form>

            </div>

        </section>

    </body>
</html>