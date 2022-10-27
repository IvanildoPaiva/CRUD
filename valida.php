<?php
session_start();
include_once("conexao.php");

// recebe os dados dos formulários cadastro e valida os campos para cadastrar no banco
if (isset($_POST['cadUser'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

  $sql = "INSERT INTO users (nome, email) VALUES ('$nome', '$email')";
  $sql_result = mysqli_query($conn, $sql);
  if ($sql_result) {
    $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
    header('location:cadastrar.php');
    exit(0);
  } else {
    $_SESSION['mensagem'] = "Usuário não cadastrado!";
    header('location:cadastrar.php');
    exit(0);
  }
}