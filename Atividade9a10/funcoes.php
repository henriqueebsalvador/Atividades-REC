<?php
session_start();

// O token confirma que o envio veio de um formulário desta sessão.
if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = bin2hex(random_bytes(32));
}

function texto($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

function tokenValido() {
    return isset($_POST["token"]) && is_string($_POST["token"])
        && hash_equals($_SESSION["token"], $_POST["token"]);
}

function receberDados() {
    $dados = [];
    foreach (["nome", "categoria", "descricao", "preco", "quantidade", "data_validade"] as $campo) {
        $dados[$campo] = "";
        if (isset($_POST[$campo]) && is_string($_POST[$campo])) {
            $dados[$campo] = trim($_POST[$campo]);
        }
    }
    $dados["preco"] = str_replace(",", ".", $dados["preco"]);
    return $dados;
}

function validarDados($dados) {
    $erros = [];
    if ($dados["nome"] == "" || mb_strlen($dados["nome"], "UTF-8") > 100) {
        $erros[] = "Informe um nome com até 100 caracteres.";
    }
    if ($dados["categoria"] == "" || mb_strlen($dados["categoria"], "UTF-8") > 60) {
        $erros[] = "Informe uma categoria com até 60 caracteres.";
    }
    if ($dados["descricao"] == "" || mb_strlen($dados["descricao"], "UTF-8") > 1000) {
        $erros[] = "Informe uma descrição com até 1000 caracteres.";
    }
    // Aceita valores positivos ou zero, com até duas casas decimais.
    if (!preg_match('/^\d{1,8}(\.\d{1,2})?$/', $dados["preco"])) {
        $erros[] = "Informe um preço entre 0 e 99999999,99, com até duas casas decimais.";
    }
    if (filter_var($dados["quantidade"], FILTER_VALIDATE_INT,
        ["options" => ["min_range" => 0, "max_range" => 2147483647]]) === false) {
        $erros[] = "Informe uma quantidade inteira entre 0 e 2147483647.";
    }

    // Confere o formato e se a data existe no calendário.
    $data = explode("-", $dados["data_validade"]);
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dados["data_validade"])
        || (int) $data[0] < 1000
        || !checkdate((int) $data[1], (int) $data[2], (int) $data[0])) {
        $erros[] = "Informe uma data de validade válida (ano entre 1000 e 9999).";
    }
    return $erros;
}
