<?php
$numero = $_POST["numero"];
$data = $_POST["data"];
$assunto = $_POST["assunto"];
$novoNumero = $_POST["novoNumero"];

// Se não digitar um novo número válido, mantém o número antigo
if ($novoNumero === "" || !is_numeric($novoNumero)) {
  $novoNumero = $numero;
}

$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$novo = [];

foreach ($linhas as $linha) {
  $dados = explode(",", $linha);
  if ($dados[0] == $numero) {
    $novo[] = "$novoNumero,$data,$assunto";
  } else {
    $novo[] = $linha;
  }
}

file_put_contents("oficios.csv", implode(PHP_EOL, $novo) . PHP_EOL);
http_response_code(200);
?>
