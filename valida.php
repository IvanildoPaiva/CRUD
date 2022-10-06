<?php
require_once 'conexao.php';
//recebe os dados do formulário e transforma em um array

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (!empty($_POST['cadUsuario'])) {

  $empty_input = false;

  $dados = array_map('trim', $dados);

  if (in_array("", $dados)) {
    $empty_input = true;
    echo
    "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
  } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
    $empty_input = true;
    echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
  }
  if (!$empty_input) {
    $cad_user = "INSERT INTO users (nome, email) VALUES (:nome, :email)";
    $stmt = $conn->prepare($cad_user);
    $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
      echo  "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
      unset($dados);
    } else {
      echo "<p style='color: #f00;'>Erro: Usuário não cadastrado!</p>";
    }
  }
}