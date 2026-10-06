<?php
require "funcoes.php";
require "conexao.php";

$produtos = [];
$mensagemErro = "";
try {
    $consulta = $conexao->prepare("SELECT id, nome, categoria, descricao, preco, quantidade, data_validade FROM produtos ORDER BY id DESC");
    $consulta->execute();
    $produtos = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
    $consulta->close();
} catch (mysqli_sql_exception $erro) {
    error_log($erro->getMessage());
    http_response_code(500);
    $mensagemErro = "Não foi possível listar os produtos. Tente novamente.";
}
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque do mercado</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Estoque do mercado</h1>
    <p><a href="cadastrar.php">Cadastrar produto</a></p>
    <?php if ($mensagem != "") { ?>
        <p><?= texto($mensagem) ?></p>
    <?php } ?>
    <?php if ($mensagemErro != "") { ?>
        <p class="erros"><?= texto($mensagemErro) ?></p>
    <?php } elseif (count($produtos) == 0) { ?>
        <p>Nenhum produto cadastrado.</p>
    <?php } else { ?>
        <div class="tabela">
            <table>
                <tr>
                    <th>Nome</th><th>Categoria</th><th>Descrição</th>
                    <th>Preço</th><th>Estoque</th><th>Validade</th><th>Ações</th>
                </tr>
                <?php foreach ($produtos as $produto) { ?>
                    <tr>
                        <td><?= texto($produto["nome"]) ?></td>
                        <td><?= texto($produto["categoria"]) ?></td>
                        <td><?= texto($produto["descricao"]) ?></td>
                        <td>R$ <?= number_format($produto["preco"], 2, ",", ".") ?></td>
                        <td><?= $produto["quantidade"] ?></td>
                        <td><?= texto(implode("/", array_reverse(explode("-", $produto["data_validade"])))) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $produto["id"] ?>">Editar</a>
                            <a href="excluir.php?id=<?= $produto["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</body>
</html>
