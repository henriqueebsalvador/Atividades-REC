<?php
require "funcoes.php";
require "conexao.php";

$id = filter_var($_GET["id"] ?? "", FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
if ($id === false) {
    http_response_code(400);
    exit('ID inválido. <a href="index.php">Voltar</a>');
}

try {
    $consulta = $conexao->prepare("SELECT id, nome FROM brinquedos WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $brinquedo = $consulta->get_result()->fetch_assoc();
    $consulta->close();
} catch (mysqli_sql_exception $erro) {
    error_log($erro->getMessage());
    http_response_code(500);
    exit('Não foi possível buscar o brinquedo. <a href="index.php">Voltar</a>');
}
if (!$brinquedo) {
    http_response_code(404);
    exit('Brinquedo não encontrado. <a href="index.php">Voltar</a>');
}

$mensagemErro = "";
// O GET mostra a confirmação. Somente o POST pode excluir.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!tokenValido()) {
        http_response_code(422);
        $mensagemErro = "Formulário inválido. Atualize a página e tente novamente.";
    } else {
        try {
            $consulta = $conexao->prepare("DELETE FROM brinquedos WHERE id = ?");
            $consulta->bind_param("i", $id);
            $consulta->execute();
            $consulta->close();
            $_SESSION["mensagem"] = "Brinquedo excluído com sucesso!";
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $erro) {
            error_log($erro->getMessage());
            http_response_code(500);
            $mensagemErro = "Não foi possível excluir o brinquedo. Tente novamente.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir brinquedo</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Excluir brinquedo</h1>
    <?php if ($mensagemErro != "") { ?>
        <p class="erros"><?= texto($mensagemErro) ?></p>
    <?php } ?>
    <p>Deseja excluir o brinquedo <strong><?= texto($brinquedo["nome"]) ?></strong>?</p>
    <form method="post">
        <input type="hidden" name="token" value="<?= texto($_SESSION["token"]) ?>">
        <button type="submit">Confirmar exclusão</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
