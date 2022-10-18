<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>



    <div class="container mt-5" class="">
      <h1>Cadastro de Clientes</h1>

      <div class="float-end"><a href="index.php" class="btn btn-danger">Listar Usuários</a><br /> <br />
      </div>
      <form name="cad-usuario" method="POST" action="valida.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome completo" aurofocus value="<?php if (isset($dados['nome'])) {

                                                                                              echo $dados['nome'];
                                                                                            } ?>"><br /><br />

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu E-mail" value="<?php if (isset($dados['email'])) {
                                                                                          echo $dados['email'];
                                                                                        } ?>"><br /><br />
        <input type="submit" class="btn btn-primary" value="cadastrar" name="cadUsuario">

      </form>
      <br>
    </div>
  </body>

</html>