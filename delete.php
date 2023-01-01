<?php
session_start();
include_once("conexao.php");

// faz um verificação se existe o ID caso o usuário tente burlar
if (!empty($_GET['id'])) {
  $id = $_GET['id'];

  $query = "UPDATE users SET ativo = 'N' WHERE id = '$id'";
  //print $query;  exit();
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
