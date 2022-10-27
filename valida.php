<?php
session_start();
include_once("conexao.php");

//verifica se existe uma valor "cadUser" vindo pelo método POST,se existir ele recebe os dados do formulário
//filtrando e realizando a sanetização para não inserir caracteres expeciais e verificando se é um tipo válido de E-mail
//caso seja, executa uma Query inserindo no banco os valores recebidos no formulário de cadastro.
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



// verifica se existe uma valor "update" vindo pelo método POST,se existir ele recebe os dados do formulário
// junto com o ID, depois monta no formulário com dados preenchidos
//depois executa uma Query UPDATE passando os valores que tem na tabela do banco filtrado pela condição WHERE (onde)
// o ID seja igual ao existente no banco de dadose então realiza as atualizações no banco.

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




// verifica se existe na variável post o valor delete, caso exista, pega o id associado
// ao usuário e executa uma Query filtrando pelo ID que veio, vai no banco e caso o idseja o mesmo
// faz a deleção. 


if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];

  $query = "DELETE FROM users  WHERE id='$user_id'";
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