<?php

function deslocarLetras($texto, $deslocamento) {
    $resultado = "";
    // A cifra altera A-Z e a-z. Acentos, espaços e pontuação são mantidos.
    for ($i = 0; $i < strlen($texto); $i++) {
        $codigo = ord($texto[$i]);
        if ($codigo >= 65 && $codigo <= 90) {
            $resultado .= chr(($codigo - 65 + $deslocamento + 26) % 26 + 65);
        } elseif ($codigo >= 97 && $codigo <= 122) {
            $resultado .= chr(($codigo - 97 + $deslocamento + 26) % 26 + 97);
        } else {
            $resultado .= $texto[$i];
        }
    }
    return $resultado;
}

function criptografarMensagem($texto) {
    return deslocarLetras($texto, 3);
}

function descriptografarMensagem($texto) {
    return deslocarLetras($texto, -3);
}
