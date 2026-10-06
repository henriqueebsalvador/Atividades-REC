<?php

function mascararCpf($cpf) {
    // Remove os pontos e o traço para trabalhar apenas com os dígitos.
    $cpf = str_replace([".", "-", " "], "", $cpf);
    if (strlen($cpf) != 11 || !ctype_digit($cpf)) {
        return "Informe um CPF com 11 dígitos.";
    }
    return "*******" . substr($cpf, -4);
}
