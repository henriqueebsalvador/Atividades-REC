<?php
require "funcoes.php";
require "conexao.php";

$id = filter_var($_GET["id"] ?? "", FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
if ($id === false) {
    http_response_code(400);
    exit('ID inválido. <a href="index.php">Voltar</a>');
}

try {
    $consulta = $conexao->prepare("SELECT id, nome, categoria, descricao, preco, quantidade, data_validade FROM produtos WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $dados = $consulta->get_result()->fetch_assoc();
    $consulta->close();
} catch (mysqli_sql_exception $erro) {
    error_log($erro->getMessage());
    http_response_code(500);
    exit('Não foi possível buscar o produto. <a href="index.php">Voltar</a>');
}
if (!$dados) {
    http_response_code(404);
    exit('Produto não encontrado. <a href="index.php">Voltar</a>');
}

$erros = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = receberDados();
    $erros = validarDados($dados);
    if (!tokenValido()) {
        $erros[] = "Formulário inválido. Atualize a página e tente novamente.";
    }
    if (count($erros) == 0) {
        try {
            $consulta = $conexao->prepare("UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ?, quantidade = ?, data_validade = ? WHERE id = ?");
            $consulta->bind_param("ssssisi", $dados["nome"], $dados["categoria"], $dados["descricao"], $dados["preco"], $dados["quantidade"], $dados["data_validade"], $id);
            $consulta->execute();
            $consulta->close();
            $_SESSION["mensagem"] = "Produto atualizado com sucesso!";
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $erro) {
            error_log($erro->getMessage());
            http_response_code(500);
            $erros[] = "Não foi possível editar o produto. Tente novamente.";
        }
    } else {
        http_response_code(422);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Editar produto</h1>
    <?php require "formulario.php"; ?>
</body>
</html>
