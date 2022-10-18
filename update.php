<?php
session_start();
require_once 'conexao.php';
$id = filter_input(INPUT_POST, FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, FILTER_VALIDATE_EMAIL);

$atualizar = "UPDATE users SET nome = '$nome', email='$email', WHERE id = '$id'";

$stmt = $conn->prepare($atualizar);
$stmt->execute();