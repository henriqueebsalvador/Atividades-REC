<?php
require "funcoes.php";
require "conexao.php";

$dados = ["nome" => "", "categoria" => "", "descricao" => "", "preco" => "", "quantidade" => "", "data_validade" => ""];
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = receberDados();
    $erros = validarDados($dados);
    if (!tokenValido()) {
        $erros[] = "Formulário inválido. Atualize a página e tente novamente.";
    }
    if (count($erros) == 0) {
        try {
            $consulta = $conexao->prepare("INSERT INTO produtos (nome, categoria, descricao, preco, quantidade, data_validade) VALUES (?, ?, ?, ?, ?, ?)");
            $consulta->bind_param("ssssis", $dados["nome"], $dados["categoria"], $dados["descricao"], $dados["preco"], $dados["quantidade"], $dados["data_validade"]);
            $consulta->execute();
            $consulta->close();
            $_SESSION["mensagem"] = "Produto cadastrado com sucesso!";
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $erro) {
            error_log($erro->getMessage());
            http_response_code(500);
            $erros[] = "Não foi possível cadastrar o produto. Tente novamente.";
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
    <title>Cadastrar produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Cadastrar produto</h1>
    <?php require "formulario.php"; ?>
</body>
</html>
