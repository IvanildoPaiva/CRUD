<?php
session_start();
include_once 'conexao.php';

//verificar se o id veio da página edit.php

if (isset($_GET["id"])) {
  $id = filter_input(INPUT_GET, FILTER_VALIDATE_INT, $_GET["id"]);

  $consulta = "SELECT * FROM users ";
  $result_usuarios = $conn->prepare($consulta);
  $result_usuarios->execute();
  if ($result_usuarios->rowCount() > 0) {

    foreach ($result_usuarios as $usuario) {
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>



    <div class="container mt-5" class="">
      <h1>Editar Usuário</h1>

      <div class="float-end"><a href="index.php" class="btn btn-danger">Listar Usuários</a><br /> <br />
      </div>
      <form name="cad-usuario" method="POST" action="update.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php echo $usuario['nome']; ?>" />

        <label for=" email">E-mail:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu E-mail"
          value="<?php echo $usuario['email']; ?>" />

        <input type="submit" class="btn btn-primary" value="Atualizar" name="atualizar">

      </form>
      <br>
    </div>
  </body>

</html>