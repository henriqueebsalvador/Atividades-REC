<?php if (count($erros) > 0) { ?>
    <ul class="erros">
        <?php foreach ($erros as $erro) { ?>
            <li><?= texto($erro) ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<form method="post">
    <input type="hidden" name="token" value="<?= texto($_SESSION["token"]) ?>">
    <label>Nome:
        <input type="text" name="nome" maxlength="100" required value="<?= texto($dados["nome"]) ?>">
    </label>
    <label>Categoria:
        <input type="text" name="categoria" maxlength="60" required value="<?= texto($dados["categoria"]) ?>">
    </label>
    <label>Descrição:
        <textarea name="descricao" maxlength="1000" required><?= texto($dados["descricao"]) ?></textarea>
    </label>
    <label>Data de validade:
        <input type="date" name="data_validade" min="1000-01-01" max="9999-12-31" required value="<?= texto($dados["data_validade"]) ?>">
    </label>
    <label>Preço (R$):
        <input type="number" name="preco" min="0" max="99999999.99" step="0.01" required value="<?= texto($dados["preco"]) ?>">
    </label>
    <label>Quantidade em estoque:
        <input type="number" name="quantidade" min="0" max="2147483647" step="1" required value="<?= texto($dados["quantidade"]) ?>">
    </label>
    <button type="submit">Salvar</button>
    <a href="index.php">Cancelar</a>
</form>
