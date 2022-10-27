<?php
session_start();
include_once("conexao.php");
// recebe os dados do formulário para realizar as atualizações no banco

if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];
  $nome = ($_POST['nome']);
  $email = $_POST['email'];
  $query = "DELETE users   nome='$nome', email='$email' WHERE id='$user_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
    header('location:index.php');
    exit(0);
  } else {
    $_SESSION['mensagem'] = "Erro ao excluir usuário";
    header('location:index.php');
    exit(0);
  }
}