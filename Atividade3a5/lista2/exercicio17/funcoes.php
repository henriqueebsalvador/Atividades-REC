<?php

function removerEspacosExtras($texto) {
    return trim(preg_replace("/\s+/u", " ", $texto));
}

function separarPalavras($texto) {
    $texto = mb_strtolower($texto, "UTF-8");
    // Troca pontuação e números por espaços, mantendo as letras com acentos.
    $texto = preg_replace("/[^\p{L}]+/u", " ", $texto);
    $texto = removerEspacosExtras($texto);
    if ($texto == "") {
        return [];
    }
    return explode(" ", $texto);
}

function contarFrases($texto) {
    $partes = preg_split("/[.!?]+/u", $texto);
    $total = 0;
    foreach ($partes as $parte) {
        if (trim($parte) != "") {
            $total++;
        }
    }
    return $total;
}

function encontrarExtremos($palavras) {
    if (count($palavras) == 0) {
        return ["longa" => "", "curta" => ""];
    }
    $longa = $palavras[0];
    $curta = $palavras[0];
    foreach ($palavras as $palavra) {
        if (mb_strlen($palavra, "UTF-8") > mb_strlen($longa, "UTF-8")) {
            $longa = $palavra;
        }
        if (mb_strlen($palavra, "UTF-8") < mb_strlen($curta, "UTF-8")) {
            $curta = $palavra;
        }
    }
    return ["longa" => $longa, "curta" => $curta];
}

function contarRepeticoes($frequencias) {
    $repeticoes = 0;
    foreach ($frequencias as $quantidade) {
        // Conta as ocorrências extras depois da primeira aparição.
        if ($quantidade > 1) {
            $repeticoes += $quantidade - 1;
        }
    }
    return $repeticoes;
}

function palavrasMaisFrequentes($frequencias) {
    arsort($frequencias);
    return array_slice($frequencias, 0, 5, true);
}

function formatarPalavras($texto) {
    return mb_convert_case($texto, MB_CASE_TITLE, "UTF-8");
}

function processarTexto($texto) {
    $limpo = removerEspacosExtras($texto);
    $palavras = separarPalavras($limpo);
    $extremos = encontrarExtremos($palavras);
    $frequencias = array_count_values($palavras);
    return [
        "caracteres" => mb_strlen($texto, "UTF-8"),
        "palavras" => count($palavras),
        "frases" => contarFrases($limpo),
        "longa" => $extremos["longa"],
        "curta" => $extremos["curta"],
        "repetidas" => contarRepeticoes($frequencias),
        "frequentes" => palavrasMaisFrequentes($frequencias),
        "semEspacosExtras" => $limpo,
        "formatado" => formatarPalavras($limpo)
    ];
}
