<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexao = new mysqli("localhost", "root", "", "gestao_brinquedos_rec", 3306);
    $conexao->set_charset("utf8mb4");
} catch (mysqli_sql_exception $erro) {
    error_log($erro->getMessage());
    http_response_code(500);
    exit("Não foi possível conectar ao banco. Confira o MySQL e importe o arquivo banco.sql.");
}
