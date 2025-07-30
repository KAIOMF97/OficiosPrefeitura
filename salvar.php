<?php
if (!isset($_POST["data"], $_POST["assunto"])) {
  http_response_code(400);
  exit("Dados incompletos");
}

$data = $_POST["data"];
$assunto = $_POST["assunto"];

$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$numero = count($linhas) + 1;

$linha = "$numero,$data,$assunto" . PHP_EOL;
file_put_contents("oficios.csv", $linha, FILE_APPEND);
?>