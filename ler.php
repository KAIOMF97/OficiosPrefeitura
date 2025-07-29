<?php
$arquivo = "oficios.csv";
$oficios = [];

if (file_exists($arquivo)) {
    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    array_shift($linhas); // remove o cabeçalho
    foreach ($linhas as $linha) {
        list($numero, $data, $assunto) = explode(",", $linha);
        $oficios[] = ["numero" => $numero, "data" => $data, "assunto" => $assunto];
    }
}

header("Content-Type: application/json");
echo json_encode($oficios);
?>