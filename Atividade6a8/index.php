<?php
require "funcoes.php";
require "conexao.php";

$brinquedos = [];
$mensagemErro = "";
try {
    $consulta = $conexao->prepare("SELECT id, nome, categoria, faixa_etaria, preco, quantidade FROM brinquedos ORDER BY id DESC");
    $consulta->execute();
    $brinquedos = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
    $consulta->close();
} catch (mysqli_sql_exception $erro) {
    error_log($erro->getMessage());
    http_response_code(500);
    $mensagemErro = "Não foi possível listar os brinquedos. Tente novamente.";
}
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de brinquedos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gestão de brinquedos</h1>
    <p><a href="cadastrar.php">Cadastrar brinquedo</a></p>
    <?php if ($mensagem != "") { ?>
        <p><?= texto($mensagem) ?></p>
    <?php } ?>
    <?php if ($mensagemErro != "") { ?>
        <p class="erros"><?= texto($mensagemErro) ?></p>
    <?php } elseif (count($brinquedos) == 0) { ?>
        <p>Nenhum brinquedo cadastrado.</p>
    <?php } else { ?>
        <div class="tabela">
            <table>
                <tr>
                    <th>Nome</th><th>Categoria</th><th>Faixa etária</th>
                    <th>Preço</th><th>Estoque</th><th>Ações</th>
                </tr>
                <?php foreach ($brinquedos as $brinquedo) { ?>
                    <tr>
                        <td><?= texto($brinquedo["nome"]) ?></td>
                        <td><?= texto($brinquedo["categoria"]) ?></td>
                        <td><?= texto($brinquedo["faixa_etaria"]) ?></td>
                        <td>R$ <?= number_format($brinquedo["preco"], 2, ",", ".") ?></td>
                        <td><?= $brinquedo["quantidade"] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $brinquedo["id"] ?>">Editar</a>
                            <a href="excluir.php?id=<?= $brinquedo["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</body>
</html>
