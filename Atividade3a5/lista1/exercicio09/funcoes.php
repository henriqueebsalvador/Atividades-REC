<?php

function analisarNumero($numero) {
    if ($numero % 2 == 0) {
        $tipo = "Par";
    } else {
        $tipo = "Ímpar";
    }
    $primo = $numero >= 2;
    $somaDivisores = 0;
    for ($i = 1; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $somaDivisores += $i;
            if ($i > 1) {
                $primo = false;
            }
        }
    }
    $perfeito = $numero > 0 && $somaDivisores == $numero;
    return [
        "Tipo" => $tipo,
        "Primo" => $primo,
        "Perfeito" => $perfeito
    ];
}
