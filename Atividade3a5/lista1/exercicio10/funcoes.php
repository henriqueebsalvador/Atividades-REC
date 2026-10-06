<?php

function calcularMedia($notas) {
    if (count($notas) == 0) {
        return ["Erro" => "Informe pelo menos uma nota."];
    }
    $media = array_sum($notas) / count($notas);
    // Critério adotado: 7 para aprovação e 5 para recuperação.
    if ($media >= 7) {
        $situacao = "Aprovado";
    } elseif ($media >= 5) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }
    return [
        "Maior nota" => max($notas),
        "Menor nota" => min($notas),
        "Média" => $media,
        "Situação" => $situacao
    ];
}
