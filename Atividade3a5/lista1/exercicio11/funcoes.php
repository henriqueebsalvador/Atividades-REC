<?php

function formatarTexto($texto) {
    return [
        "Maiúsculas" => mb_strtoupper($texto, "UTF-8"),
        "Minúsculas" => mb_strtolower($texto, "UTF-8"),
        "Primeira letra de cada palavra" => mb_convert_case($texto, MB_CASE_TITLE, "UTF-8"),
        "Caracteres" => mb_strlen($texto, "UTF-8")
    ];
}
