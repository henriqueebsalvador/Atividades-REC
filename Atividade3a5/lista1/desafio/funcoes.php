<?php

function calcularSubtotais($produtos) {
    $resultado = [];
    foreach ($produtos as $produto) {
        $produto["subtotal"] = $produto["quantidade"] * $produto["valorUnitario"];
        $resultado[] = $produto;
    }
    return $resultado;
}

function calcularTotalCompra($produtos) {
    $total = 0;
    foreach ($produtos as $produto) {
        $total += $produto["subtotal"];
    }
    return $total;
}

function calcularDescontoPedido($total) {
    if ($total > 1000) {
        return $total * 0.15;
    } elseif ($total > 500) {
        return $total * 0.10;
    }
    return 0;
}

function calcularFrete($total) {
    // O frete usa o total dos produtos antes do desconto.
    if ($total > 800) {
        return 0;
    } elseif ($total > 300) {
        return 20;
    }
    return 35;
}

function resumirProdutos($produtos) {
    $nomes = [];
    $itens = 0;
    $maisCaro = null;
    $maiorSubtotal = null;
    foreach ($produtos as $produto) {
        $nomes[] = mb_strtolower(trim($produto["nome"]), "UTF-8");
        $itens += $produto["quantidade"];
        if ($maisCaro === null || $produto["valorUnitario"] > $maisCaro["valorUnitario"]) {
            $maisCaro = $produto;
        }
        if ($maiorSubtotal === null || $produto["subtotal"] > $maiorSubtotal["subtotal"]) {
            $maiorSubtotal = $produto;
        }
    }
    return [
        "diferentes" => count(array_unique($nomes)),
        "itens" => $itens,
        "maisCaro" => $maisCaro,
        "maiorSubtotal" => $maiorSubtotal
    ];
}

function processarPedido($produtos) {
    $produtos = calcularSubtotais($produtos);
    $total = calcularTotalCompra($produtos);
    $desconto = calcularDescontoPedido($total);
    $frete = 0;
    if (count($produtos) > 0) {
        $frete = calcularFrete($total);
    }
    $resumo = resumirProdutos($produtos);
    return [
        "produtos" => $produtos,
        "diferentes" => $resumo["diferentes"],
        "itens" => $resumo["itens"],
        "maisCaro" => $resumo["maisCaro"],
        "maiorSubtotal" => $resumo["maiorSubtotal"],
        "total" => $total,
        "desconto" => $desconto,
        "frete" => $frete,
        "final" => $total - $desconto + $frete
    ];
}
