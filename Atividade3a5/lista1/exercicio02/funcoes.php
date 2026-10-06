<?php

function inverterTexto($texto) {
    $invertido = "";
    // mb_strlen e mb_substr também reconhecem letras com acentos.
    for ($i = mb_strlen($texto, "UTF-8") - 1; $i >= 0; $i--) {
        $invertido .= mb_substr($texto, $i, 1, "UTF-8");
    }
    return $invertido;
}
