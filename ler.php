<?php
$linhas = file("oficios.csv", FILE_IGNORE_NEW_LINES);
$dados = [];

foreach ($linhas as $linha) {
  list($numero, $data, $assunto) = explode(",", $linha);
  $dados[] = ["numero" => $numero, "data" => $data, "assunto" => $assunto];
}

header("Content-Type: application/json");
echo json_encode($dados);
?>