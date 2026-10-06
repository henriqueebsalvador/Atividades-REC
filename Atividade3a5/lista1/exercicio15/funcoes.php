<?php

function gerarSenha($tamanho) {
    if ($tamanho < 4) {
        return "Use pelo menos 4 caracteres.";
    }
    $grupos = ["ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz", "0123456789", "!@#$%&*?"];
    $senha = "";
    // Garante pelo menos um caractere de cada grupo.
    foreach ($grupos as $grupo) {
        $senha .= $grupo[random_int(0, strlen($grupo) - 1)];
    }
    $caracteres = implode("", $grupos);
    for ($i = 4; $i < $tamanho; $i++) {
        $senha .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }
    // Troca as posições para variar a ordem dos caracteres.
    for ($i = strlen($senha) - 1; $i > 0; $i--) {
        $posicao = random_int(0, $i);
        $temporario = $senha[$i];
        $senha[$i] = $senha[$posicao];
        $senha[$posicao] = $temporario;
    }
    return $senha;
}

function inverterTexto($texto) {
    $invertido = "";
    // mb_strlen e mb_substr também reconhecem letras com acentos.
    for ($i = mb_strlen($texto, "UTF-8") - 1; $i >= 0; $i--) {
        $invertido .= mb_substr($texto, $i, 1, "UTF-8");
    }
    return $invertido;
}

function calcularImc($peso, $altura) {
    if ($peso <= 0 || $altura <= 0) {
        return "Peso e altura devem ser maiores que zero.";
    }
    return $peso / ($altura * $altura);
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function contarVogais($texto) {
    return preg_match_all("/[aeiouáàâãéêíóôõúü]/iu", $texto);
}

function calcularIdade($nascimento) {
    // A data deve estar no formato ano-mês-dia.
    $data = explode("-", $nascimento);
    if (count($data) != 3 || !ctype_digit($data[0]) || !ctype_digit($data[1]) || !ctype_digit($data[2])) {
        return "Data inválida.";
    }
    if (!checkdate((int) $data[1], (int) $data[2], (int) $data[0])) {
        return "Data inválida.";
    }
    $dataCompleta = sprintf("%04d-%02d-%02d", $data[0], $data[1], $data[2]);
    if ($dataCompleta > date("Y-m-d")) {
        return "A data não pode estar no futuro.";
    }
    $idade = (int) date("Y") - (int) $data[0];
    if (date("m-d") < substr($dataCompleta, 5)) {
        $idade--;
    }
    return $idade;
}

function converterMoeda($valor, $cotacao) {
    return $valor * $cotacao;
}

function formatarTelefone($telefone) {
    $telefone = str_replace(["(", ")", "-", " "], "", $telefone);
    if (!ctype_digit($telefone)) {
        return "Telefone inválido.";
    }
    if (strlen($telefone) == 11) {
        return "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7);
    } elseif (strlen($telefone) == 10) {
        return "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 4) . "-" . substr($telefone, 6);
    }
    return "Informe 10 ou 11 dígitos, incluindo o DDD.";
}

function gerarSaudacao($hora) {
    if ($hora < 0 || $hora > 23) {
        return "Hora inválida.";
    } elseif ($hora < 12) {
        return "Bom dia!";
    } elseif ($hora < 18) {
        return "Boa tarde!";
    }
    return "Boa noite!";
}

function validarSenhaForte($senha) {
    return mb_strlen($senha, "UTF-8") >= 8
        && preg_match("/\p{Lu}/u", $senha)
        && preg_match("/\p{Ll}/u", $senha)
        && preg_match("/[0-9]/", $senha)
        && preg_match("/[^\p{L}\p{N}\s]/u", $senha);
}
