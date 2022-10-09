<?php
include_once 'conexao.php'; ?>

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
    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <div class="card-header">
            <h4>Listar Usuários
            </h4>
            <div class="txt-right"><a href="cadastrar.php" class="btn btn-danger ">Novo
                Usuário</a></div>

            <div class="card-body">
              <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                //Faz uma consulta no banco de dados e depois pega todo o resultado e monta na tela para o usuário listando o conteúdo
                $consulta = "SELECT * FROM users ";
                $result_usuarios = $conn->prepare($consulta);
                $result_usuarios->execute();

                if ($result_usuarios->rowCount() > 0) {

                  foreach ($result_usuarios as $usuario) {

                ?>
                  <tr>

                    <td><?= $usuario['id']; ?></td>
                    <td><?= $usuario['nome']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td><a class="btn btn-success btn-sm" href="Edit.php">Editar</a></td>
                    <td><a class="btn btn-danger btn-sm" href="delete.php">Excluir</a></td>
                  </tr>

                  <?php
                  }
                }

                ?>

                </tbody>
              </table>

            </div>
          </div>

        </div>

      </div>

    </div>


  </body>

</html>