<?php

include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Precedural</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <div class="container mt-5 ">

    <h4>Editar Usuário</h4>
    <br />
    <!-- chamada da consulta no banco de dados -->
    <?php
  if (isset($_GET['id'])) {
    $user_id = ($_GET['id']);

    $query = "SELECT * FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {

      $row = mysqli_fetch_array($query_run);
  ?>

    <form class="form-control m-5" action="update.php" method="POST">
      <input type="hidden" name="user_id" value="<?= $row['id']; ?>" />
      <label class="form-label" for="nome">Nome:</label>
      <input class="form-control " type="text" name="nome" value="<?= $row['nome']; ?>" placeholder="Nome completo"
        require />
      <label class=" form-label" for="email">Email:</label>

      <input class="form-control" type=" email" name="email" value="<?= $row['email']; ?>"
        placeholder=" Digite seu E-mail" require />
      <br />
      <input type="submit" class="btn btn-primary" name="update" value="Atualizar" />

    </form>
    <?php
    } else {
      echo "<h4>Não foi encontrado um ID !</h4>";
    }
  }
  ?>

  </div>

  <body>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>

</html>