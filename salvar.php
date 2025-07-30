<?php
if (!isset($_POST["data"], $_POST["assunto"])) {
  http_response_code(400);
  exit("Dados incompletos");
}

$data = $_POST["data"];
$assunto = $_POST["assunto"];

$arquivo = "oficios.csv";

// Garante que o arquivo exista
if (!file_exists($arquivo)) {
  file_put_contents($arquivo, "");
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
$maiorNumero = 0;

foreach ($linhas as $linha) {
  $partes = explode(",", $linha);
  if (is_numeric($partes[0]) && (int)$partes[0] > $maiorNumero) {
    $maiorNumero = (int)$partes[0];
  }
}

$novoNumero = $maiorNumero + 1;
$novaLinha = "$novoNumero,$data,$assunto";

// Adiciona quebra de linha apenas se o arquivo não estiver vazio e não terminar com \n
$conteudoAtual = file_get_contents($arquivo);
$separador = (strlen($conteudoAtual) > 0 && substr($conteudoAtual, -1) !== "\n") ? PHP_EOL : "";

file_put_contents($arquivo, $separador . $novaLinha . PHP_EOL, FILE_APPEND);
?>
