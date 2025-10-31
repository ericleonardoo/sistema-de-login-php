<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $host = "sql100.infinityfree.com";
    $usuario = "if0_40230953";
    $senha = "TWSE3bpigb";
    $banco = "if0_40230953_enddoback";
    try {
        $conn = new mysqli($host, $usuario, $senha, $banco);
        $conn->set_charset('utf8mb4');
    } catch (mysqli_sql_exception $e) {
        die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
    }
?>