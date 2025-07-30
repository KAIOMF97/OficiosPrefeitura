<?php
$numero = $_POST["numero"];
$data = $_POST["data"];
$assunto = $_POST["assunto"];

$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$novo = [];

foreach ($linhas as $linha) {
  $dados = explode(",", $linha);
  if ($dados[0] == $numero) {
    $novo[] = "$numero,$data,$assunto";
  } else {
    $novo[] = $linha;
  }
}

file_put_contents("oficios.csv", implode(PHP_EOL, $novo));
http_response_code(200);
?>