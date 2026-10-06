<?php

function ordenarNomes($texto) {
    $partes = explode(",", $texto);
    $nomes = [];
    foreach ($partes as $nome) {
        $nome = trim($nome);
        if ($nome != "") {
            $nomes[] = $nome;
        }
    }
    sort($nomes, SORT_NATURAL | SORT_FLAG_CASE);
    return $nomes;
}
