<?php

function calcularDesconto($valor) {
    $porcentagem = 0;
    if ($valor > 1000) {
        $porcentagem = 30;
    } elseif ($valor > 500) {
        $porcentagem = 20;
    } elseif ($valor > 100) {
        $porcentagem = 10;
    }
    $desconto = $valor * $porcentagem / 100;
    return [
        "Valor original" => $valor,
        "Desconto" => $desconto,
        "Valor final" => $valor - $desconto
    ];
}
