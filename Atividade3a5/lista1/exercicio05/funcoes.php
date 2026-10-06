<?php

function analisarTexto($texto) {
    $minusculo = mb_strtolower($texto, "UTF-8");
    $vogais = 0;
    $consoantes = 0;
    for ($i = 0; $i < mb_strlen($minusculo, "UTF-8"); $i++) {
        $letra = mb_substr($minusculo, $i, 1, "UTF-8");
        if (mb_strpos("aeiouáàâãéêíóôõúü", $letra, 0, "UTF-8") !== false) {
            $vogais++;
        } elseif (mb_strpos("bcdfghjklmnpqrstvwxyzç", $letra, 0, "UTF-8") !== false) {
            $consoantes++;
        }
    }
    // A expressão encontra palavras e reconhece letras acentuadas.
    $palavras = preg_match_all("/\p{L}+/u", $texto);
    return [
        "Palavras" => $palavras,
        "Caracteres" => mb_strlen($texto, "UTF-8"),
        "Vogais" => $vogais,
        "Consoantes" => $consoantes
    ];
}
