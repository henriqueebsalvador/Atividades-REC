<?php

function estatisticasNumericas($numeros) {
    $quantidade = count($numeros);
    if ($quantidade == 0) {
        return ["Erro" => "Informe pelo menos um número."];
    }
    sort($numeros, SORT_NUMERIC);
    $meio = (int) ($quantidade / 2);
    if ($quantidade % 2 == 0) {
        $mediana = ($numeros[$meio - 1] + $numeros[$meio]) / 2;
    } else {
        $mediana = $numeros[$meio];
    }
    $pares = 0;
    $impares = 0;
    foreach ($numeros as $numero) {
        // Somente números inteiros são classificados como pares ou ímpares.
        if ($numero == (int) $numero) {
            if ($numero % 2 == 0) {
                $pares++;
            } else {
                $impares++;
            }
        }
    }
    return [
        "Soma" => array_sum($numeros),
        "Média" => array_sum($numeros) / $quantidade,
        "Maior valor" => max($numeros),
        "Menor valor" => min($numeros),
        "Mediana" => $mediana,
        "Pares" => $pares,
        "Ímpares" => $impares
    ];
}
