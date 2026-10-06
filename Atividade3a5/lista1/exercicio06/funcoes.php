<?php

function converterTemperatura($valor, $origem, $destino) {
    $origem = strtoupper($origem);
    $destino = strtoupper($destino);
    if (!in_array($origem, ["C", "F", "K"]) || !in_array($destino, ["C", "F", "K"])) {
        return "Escala inválida. Use C, F ou K.";
    }
    // Primeiro transforma a temperatura em Celsius.
    if ($origem == "F") {
        $celsius = ($valor - 32) / 1.8;
    } elseif ($origem == "K") {
        $celsius = $valor - 273.15;
    } else {
        $celsius = $valor;
    }
    if ($destino == "F") {
        return $celsius * 1.8 + 32;
    } elseif ($destino == "K") {
        return $celsius + 273.15;
    }
    return $celsius;
}
