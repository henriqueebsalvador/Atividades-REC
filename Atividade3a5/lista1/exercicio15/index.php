<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 15 - Biblioteca de funções</title>
</head>
<body>
<h1>Exercício 15 - Biblioteca de funções</h1>
<?php
require "funcoes.php";

date_default_timezone_set("America/Sao_Paulo");
echo "<p>1. IMC (70 kg e 1,75 m): " . number_format(calcularImc(70, 1.75), 2, ",", ".") . "</p>";
echo "<p>2. E-mail aluno@example.com: " . (validarEmail("aluno@example.com") ? "Válido" : "Inválido") . "</p>";
echo "<p>3. Senha aleatória: " . htmlspecialchars(gerarSenha(10)) . "</p>";
echo "<p>4. Vogais de Programação: " . contarVogais("Programação") . "</p>";
echo "<p>5. Olá invertido: " . htmlspecialchars(inverterTexto("Olá")) . "</p>";
echo "<p>6. Idade de quem nasceu em 15/03/2008: " . calcularIdade("2008-03-15") . " anos</p>";
echo "<p>7. US$ 10 em reais (cotação de exemplo: R$ 5): R$ " . number_format(converterMoeda(10, 5), 2, ",", ".") . "</p>";
echo "<p>8. Telefone: " . formatarTelefone("47999998888") . "</p>";
echo "<p>9. Saudação do horário atual: " . gerarSaudacao((int) date("H")) . "</p>";
echo "<p>10. Senha Abc123!x: " . (validarSenhaForte("Abc123!x") ? "Forte" : "Fraca") . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
