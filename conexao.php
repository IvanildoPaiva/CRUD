<?php


try {

  $conn = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');
} catch (PDOException $e) {
  echo "Erro ao conectar-se ao banco de dados" . $e->getMessage();
}