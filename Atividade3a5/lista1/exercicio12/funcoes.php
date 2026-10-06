<?php

function analisarProdutos($produtos, $pesquisa) {
    if (count($produtos) == 0) {
        return ["Erro" => "Nenhum produto cadastrado."];
    }
    $caro = $produtos[0];
    $barato = $produtos[0];
    $soma = 0;
    $encontrados = [];
    foreach ($produtos as $produto) {
        $soma += $produto["preco"];
        if ($produto["preco"] > $caro["preco"]) {
            $caro = $produto;
        }
        if ($produto["preco"] < $barato["preco"]) {
            $barato = $produto;
        }
        if (trim($pesquisa) != "" && mb_stripos($produto["nome"], trim($pesquisa), 0, "UTF-8") !== false) {
            $encontrados[] = $produto;
        }
    }
    return [
        "maisCaro" => $caro,
        "maisBarato" => $barato,
        "media" => $soma / count($produtos),
        "pesquisa" => $encontrados
    ];
}
