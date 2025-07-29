<?php
$numero = $_GET["numero"];
$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$novo = [];

foreach ($linhas as $linha) {
  $dados = explode(",", $linha);
  if ($dados[0] != $numero) {
    $novo[] = $linha;
  }
}

file_put_contents("oficios.csv", implode(PHP_EOL, $novo));
http_response_code(200);
?>