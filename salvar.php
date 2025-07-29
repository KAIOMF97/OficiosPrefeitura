<?php
$arquivo = "oficios.csv";

// Cria CSV com cabeçalho se não existir
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "numero,data,assunto\n");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST['data'] ?? '';
    $assunto = $_POST['assunto'] ?? '';

    if (empty($data) || empty($assunto)) {
        http_response_code(400);
        echo "Dados inválidos";
        exit;
    }

    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numero = count($linhas); // começa do 1, considerando cabeçalho na linha 1

    $linha = "$numero,$data,$assunto\n";
    file_put_contents($arquivo, $linha, FILE_APPEND);
    echo "OK";
}
?>