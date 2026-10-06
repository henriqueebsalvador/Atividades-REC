<?php

function contarMaiusculas($senha) {
    return preg_match_all("/\p{Lu}/u", $senha);
}

function contarMinusculas($senha) {
    return preg_match_all("/\p{Ll}/u", $senha);
}

function contarNumeros($senha) {
    return preg_match_all("/[0-9]/", $senha);
}

function contarEspeciais($senha) {
    return preg_match_all("/[^\p{L}\p{N}\s]/u", $senha);
}

function classificarSenha($tamanho, $maiusculas, $minusculas, $numeros, $especiais) {
    if ($tamanho < 8) {
        return "Fraca";
    }
    $grupos = 0;
    foreach ([$maiusculas, $minusculas, $numeros, $especiais] as $quantidade) {
        if ($quantidade > 0) {
            $grupos++;
        }
    }
    // Com 8 ou mais caracteres: 2 grupos = média, 3 = forte, 4 = muito forte.
    if ($grupos == 4) {
        return "Muito Forte";
    } elseif ($grupos == 3) {
        return "Forte";
    } elseif ($grupos == 2) {
        return "Média";
    }
    return "Fraca";
}

function analisarSenha($senha) {
    $maiusculas = contarMaiusculas($senha);
    $minusculas = contarMinusculas($senha);
    $numeros = contarNumeros($senha);
    $especiais = contarEspeciais($senha);
    $tamanho = mb_strlen($senha, "UTF-8");
    return [
        "Maiúsculas" => $maiusculas,
        "Minúsculas" => $minusculas,
        "Números" => $numeros,
        "Especiais" => $especiais,
        "Tamanho" => $tamanho,
        "Nível de segurança" => classificarSenha($tamanho, $maiusculas, $minusculas, $numeros, $especiais)
    ];
}
