<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 18 - Gerenciador de agenda</title>
</head>
<body>
<h1>Exercício 18 - Gerenciador de agenda</h1>
<?php
require "funcoes.php";

$consultas = [
    ["paciente" => "Ana", "especialidade" => "Clínico geral", "data" => "2026-10-06", "horario" => "10:00"],
    ["paciente" => "Pedro", "especialidade" => "Cardiologia", "data" => "2026-10-06", "horario" => "08:00"],
    ["paciente" => "Carlos", "especialidade" => "Clínico geral", "data" => "2026-10-06", "horario" => "10:00"],
    ["paciente" => "Ana", "especialidade" => "Cardiologia", "data" => "2026-10-07", "horario" => "09:00"]
];
$pesquisa = $_GET["paciente"] ?? "";
$resultado = organizarAgenda($consultas, $pesquisa);
?>
<form method="get">
    <label>Nome do paciente: <input type="text" name="paciente" required></label>
    <button type="submit">Pesquisar</button>
</form>
<?php
echo "<p>Total de consultas: " . $resultado["total"] . "</p>";
echo "<p>Pacientes diferentes: " . $resultado["pacientes"] . "</p>";
echo "<h2>Consultas por especialidade</h2>";
foreach ($resultado["especialidades"] as $especialidade => $quantidade) {
    echo "<p>" . htmlspecialchars($especialidade) . ": $quantidade</p>";
}
echo "<h2>Primeiro e último atendimento de cada dia</h2>";
foreach ($resultado["atendimentosPorDia"] as $data => $dia) {
    echo "<p>Data: $data | Primeiro: " . $dia["primeiro"]["horario"] . " (" . htmlspecialchars($dia["primeiro"]["paciente"]) . ")";
    echo " | Último: " . $dia["ultimo"]["horario"] . " (" . htmlspecialchars($dia["ultimo"]["paciente"]) . ")</p>";
}
echo "<h2>Agenda em ordem de data e horário</h2>";
?>
<table border="1" cellpadding="6">
    <tr><th>Paciente</th><th>Especialidade</th><th>Data</th><th>Horário</th></tr>
    <?php foreach ($resultado["ordenadas"] as $consulta) { ?>
        <tr>
            <td><?= htmlspecialchars($consulta["paciente"]) ?></td>
            <td><?= htmlspecialchars($consulta["especialidade"]) ?></td>
            <td><?= $consulta["data"] ?></td>
            <td><?= $consulta["horario"] ?></td>
        </tr>
    <?php } ?>
</table>
<?php
echo "<h2>Horários duplicados</h2>";
if (count($resultado["duplicados"]) == 0) {
    echo "<p>Nenhum horário duplicado.</p>";
}
foreach ($resultado["duplicados"] as $horario => $quantidade) {
    echo "<p>$horario: $quantidade consultas</p>";
}
if ($pesquisa != "") {
    echo "<h2>Resultado da pesquisa</h2>";
    if (count($resultado["pesquisa"]) == 0) {
        echo "<p>Paciente não encontrado.</p>";
    }
    foreach ($resultado["pesquisa"] as $consulta) {
        echo "<p>" . htmlspecialchars($consulta["paciente"]) . " - " . htmlspecialchars($consulta["especialidade"]) . " - " . $consulta["data"] . " às " . $consulta["horario"] . "</p>";
    }
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
