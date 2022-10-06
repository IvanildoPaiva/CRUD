<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
  </head>

  <body>
    <h1>Cadastro de Clientes</h1>

    <a href="index.php">Listar</a>
    <a href="cadastrar.php">cadastrar</a>
    <form name="cad-usuario" method="POST" action="valida.php">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" placeholder="Informe seu nome completo" value="<?php if (isset($dados['nome'])) {

                                                                                              echo $dados['nome'];
                                                                                            } ?>"><br /><br />

      <label for="email">E-mail:</label>
      <input type="text" name="email" id="email" placeholder="Digite seu E-mail" value="<?php if (isset($dados['email'])) {
                                                                                        echo $dados['email'];
                                                                                      } ?>"><br /><br />
      <input type="submit" value="cadastrar" name="cadUsuario">

    </form>


  </body>

</html>