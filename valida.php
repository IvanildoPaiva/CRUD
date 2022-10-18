<?php
session_start();
require_once 'conexao.php';
//recebe os dados do formulário e transforma em um array

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// se for diferente de vazio o  conteúdo do botão que no caso é um botão com input, e o nome do botão é cadUsuario
if (!empty($_POST['cadUsuario'])) {

  $empty_input = false; //aqui foi criado uma variável chamada empy_input e seu valor inicial é false ou seja falço

  $dados = array_map('trim', $dados); // aqui peguei a variável $dados que veio dos inputs do formulário da index e chamei o metodo array map e deu um trim pra limpar os espaços

  //criei uma condição e chamei o in_array e setei a variável $empty_input como true, se essa condição for verdadeira, é sinal que tem campos vazios, chamo a função echo para imprimir na tela a frase para preencher o campo nome e email
  if (in_array("", $dados)) {
    $empty_input = true;
    echo
    "<p style='color: #f00;'>É Necessário preencher todos campos!</p>";
  } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
    $empty_input = true;
    echo "<p style='color: #f00;'>É Necessário preencher com e-mail válido!</p>";
  }
  /*aqui faço a chamada da variável invertendo a lógica com o ponto de exclamação dizendo que ser for diferente da variável $empty_input que até aqui ela é verdadeira,
   ou seja vazio, mas se ao chegar até aqui significa que não está vazio e então inicia o processo de cadastro no banco.*/
  if (!$empty_input) {
    $cad_user = "INSERT INTO users (nome, email) VALUES (:nome, :email)";
    $stmt = $conn->prepare($cad_user);
    $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $stmt->execute();
    /* aqui utilizo uma condição, que se a variável $stmt que contem as informações acima, e se ela contem dados que é o contador rowCount, chama a função de imprimir a mensagem na tela dizendo que foi cadastrado com sucesso!*/
    if ($stmt->rowCount()) {
      $_SESSION['mensagem'] = "Cadastrado com sucesso!";
      header('Location: index.php?');
      //aqui utilizo a função de matar ou destruir os dados caso não seja possível cadastrar no banco com a função unset e passando a variável que com tem os dados $dados e não sendo possível cadastrar utilizo o else para
      //exibir a mensagem dizendo que não foi possível cadastrar usuário.
      unset($dados);
    } else {
      $_SESSION['mensagem'] = "Erro ao Cadastrar usuário!";
      header('Location: index.php?');
    }
  }
}