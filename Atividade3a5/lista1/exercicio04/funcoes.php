<?php

function gerarSenha($tamanho) {
    if ($tamanho < 4) {
        return "Use pelo menos 4 caracteres.";
    }
    $grupos = ["ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz", "0123456789", "!@#$%&*?"];
    $senha = "";
    // Garante pelo menos um caractere de cada grupo.
    foreach ($grupos as $grupo) {
        $senha .= $grupo[random_int(0, strlen($grupo) - 1)];
    }
    $caracteres = implode("", $grupos);
    for ($i = 4; $i < $tamanho; $i++) {
        $senha .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }
    // Troca as posições para variar a ordem dos caracteres.
    for ($i = strlen($senha) - 1; $i > 0; $i--) {
        $posicao = random_int(0, $i);
        $temporario = $senha[$i];
        $senha[$i] = $senha[$posicao];
        $senha[$posicao] = $temporario;
    }
    return $senha;
}
