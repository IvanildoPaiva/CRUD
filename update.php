<?php
session_start();
include_once("conexao.php");
// recebe os dados do formulário para realizar as atualizações no banco

if (isset($_POST['update'])) {
  $user_id = $_POST['user_id'];
  $nome = ($_POST['nome']);
  $email = $_POST['email'];
  $query = "UPDATE users SET  nome='$nome', email='$email' WHERE id='$user_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
    header('location:index.php');
    exit(0);
  } else {
    $_SESSION['mensagem'] = "Erro ao atualizar usuário";
    header('location:index.php');
    exit(0);
  }
}