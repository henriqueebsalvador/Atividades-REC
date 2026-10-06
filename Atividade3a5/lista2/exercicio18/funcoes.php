<?php

function ordenarConsultas($consultas) {
    // Compara as datas no formato ano-mês-dia e depois os horários.
    for ($i = 0; $i < count($consultas) - 1; $i++) {
        for ($j = $i + 1; $j < count($consultas); $j++) {
            $primeira = $consultas[$i]["data"] . " " . $consultas[$i]["horario"];
            $segunda = $consultas[$j]["data"] . " " . $consultas[$j]["horario"];
            if ($primeira > $segunda) {
                $temporaria = $consultas[$i];
                $consultas[$i] = $consultas[$j];
                $consultas[$j] = $temporaria;
            }
        }
    }
    return $consultas;
}

function contarPacientes($consultas) {
    $nomes = [];
    foreach ($consultas as $consulta) {
        $nomes[] = mb_strtolower(trim($consulta["paciente"]), "UTF-8");
    }
    return count(array_unique($nomes));
}

function contarEspecialidades($consultas) {
    $especialidades = [];
    foreach ($consultas as $consulta) {
        $nome = $consulta["especialidade"];
        if (!isset($especialidades[$nome])) {
            $especialidades[$nome] = 0;
        }
        $especialidades[$nome]++;
    }
    return $especialidades;
}

function pesquisarPaciente($consultas, $pesquisa) {
    $encontrados = [];
    if (trim($pesquisa) == "") {
        return $encontrados;
    }
    foreach ($consultas as $consulta) {
        if (mb_stripos($consulta["paciente"], trim($pesquisa), 0, "UTF-8") !== false) {
            $encontrados[] = $consulta;
        }
    }
    return $encontrados;
}

function encontrarHorariosDuplicados($consultas) {
    $horarios = [];
    foreach ($consultas as $consulta) {
        $chave = $consulta["data"] . " " . $consulta["horario"];
        if (!isset($horarios[$chave])) {
            $horarios[$chave] = 0;
        }
        $horarios[$chave]++;
    }
    $duplicados = [];
    foreach ($horarios as $horario => $quantidade) {
        if ($quantidade > 1) {
            $duplicados[$horario] = $quantidade;
        }
    }
    return $duplicados;
}

function atendimentosPorDia($ordenadas) {
    $dias = [];
    foreach ($ordenadas as $consulta) {
        $data = $consulta["data"];
        if (!isset($dias[$data])) {
            $dias[$data] = ["primeiro" => $consulta, "ultimo" => $consulta];
        }
        $dias[$data]["ultimo"] = $consulta;
    }
    return $dias;
}

function organizarAgenda($consultas, $pesquisa = "") {
    $ordenadas = ordenarConsultas($consultas);
    return [
        "total" => count($consultas),
        "pacientes" => contarPacientes($consultas),
        "especialidades" => contarEspecialidades($consultas),
        "atendimentosPorDia" => atendimentosPorDia($ordenadas),
        "ordenadas" => $ordenadas,
        "pesquisa" => pesquisarPaciente($consultas, $pesquisa),
        "duplicados" => encontrarHorariosDuplicados($consultas)
    ];
}
