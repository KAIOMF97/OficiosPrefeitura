<?php
if (!isset($_POST["data"], $_POST["assunto"])) {
  http_response_code(400);
  exit("Dados incompletos");
}

$data = $_POST["data"];
$assunto = $_POST["assunto"];

$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$maiorNumero = 264; // Começa em 264, o próximo será 265

foreach ($linhas as $linha) {
  $partes = explode(",", $linha);
  if (is_numeric($partes[0]) && (int)$partes[0] > $maiorNumero) {
    $maiorNumero = (int)$partes[0];
  }
}

$novoNumero = $maiorNumero + 1;
$novaLinha = "$novoNumero,$data,$assunto" . PHP_EOL;
file_put_contents("oficios.csv", $novaLinha, FILE_APPEND);
?>
