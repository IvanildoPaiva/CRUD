<?php
require_once 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>
    <a href="index.php">Listar</a>
    <a href="cadastrar.php">cadastrar</a>
    <h1>Listar Clientes</h1>

    <?php

  $consulta = "SELECT id, nome, email  FROM users ";
  $result_usuarios = $conn->prepare($consulta);
  $result_usuarios->execute();

  if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
      // var_dump($row_usuario);
      extract($row_usuario);
      echo "ID: $id <br>";
      echo "Nome: $nome <br>";
      echo "E-mail: $email";
      echo "<hr>";
    }
  } else {
    echo "<p style='color: #f00;'>Erro: Usuário não cadastrado!</p>";
  }

  ?>



  </body>

</html>