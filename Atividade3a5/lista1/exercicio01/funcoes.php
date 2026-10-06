<?php

function calcularFormula($x, $y) {
    if ($x + $y == 0) {
        return "Não é possível dividir por zero.";
    }
    return ($x * $x + $y * $y) / ($x + $y);
}
