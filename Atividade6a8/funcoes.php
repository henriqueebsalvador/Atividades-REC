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
    foreach (["nome", "categoria", "faixa_etaria", "preco", "quantidade"] as $campo) {
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
    if ($dados["faixa_etaria"] == "" || mb_strlen($dados["faixa_etaria"], "UTF-8") > 50) {
        $erros[] = "Informe uma faixa etária com até 50 caracteres.";
    }
    // Aceita valores positivos ou zero, com até duas casas decimais.
    if (!preg_match('/^\d{1,8}(\.\d{1,2})?$/', $dados["preco"])) {
        $erros[] = "Informe um preço entre 0 e 99999999,99, com até duas casas decimais.";
    }
    if (filter_var($dados["quantidade"], FILTER_VALIDATE_INT,
        ["options" => ["min_range" => 0, "max_range" => 2147483647]]) === false) {
        $erros[] = "Informe uma quantidade inteira entre 0 e 2147483647.";
    }
    return $erros;
}
