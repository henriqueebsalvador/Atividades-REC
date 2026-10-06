# Atividades 6 a 8 - Gestão de brinquedos

Sistema simples em PHP e MySQL para cadastrar, listar, editar e excluir brinquedos.
Cada brinquedo tem nome, categoria, faixa etária, preço e quantidade em estoque.

## Como executar no XAMPP

1. Inicie o Apache e o MySQL.
2. Abra http://localhost:8080/phpmyadmin/ e use a opção Importar para executar o arquivo banco.sql.
3. Confira os dados em conexao.php. O padrão deste projeto é servidor localhost, porta 3306, usuário root, senha vazia e banco gestao_brinquedos_rec.
4. Abra http://localhost:8080/henrique_salvador_2026/Atividades-REC/Atividade6a8/
5. Clique em Cadastrar brinquedo. Na listagem, use Editar ou Excluir.

Neste computador, o Apache usa a porta 8080. Se o seu usar a porta 80, retire :8080 dos links.
O arquivo SQL cria o banco e a tabela sem apagar dados existentes.

## Arquivos

- banco.sql: criação do banco e da tabela.
- conexao.php: conexão com o MySQL.
- funcoes.php: validação, proteção dos formulários e tratamento de texto para exibição.
- formulario.php: campos usados no cadastro e na edição.
- index.php: listagem.
- cadastrar.php: cadastro.
- editar.php: edição.
- excluir.php: confirmação e exclusão.
- estilo.css: aparência simples.

## Validações e banco

Os campos de texto são obrigatórios e têm limite de tamanho.
O preço aceita zero ou valores positivos com até duas casas decimais.
A quantidade precisa ser um número inteiro entre zero e 2147483647.
O ID precisa ser um inteiro positivo e corresponder a um brinquedo cadastrado.

Todas as consultas do sistema usam prepare e execute. Os valores recebidos são enviados por bind_param, sem concatená-los ao SQL.
O preço é enviado como texto decimal para preservar as casas decimais no campo DECIMAL.
Os erros do banco são registrados no log do PHP e a página mostra uma mensagem simples.
A exclusão precisa de confirmação e envio por POST.
Os formulários usam um token de sessão para validar o envio.
O texto é exibido com htmlspecialchars para não ser interpretado como HTML.

Utiliza PHP 8, mysqli, mbstring e MySQL/MariaDB. Não precisa de Composer, frameworks ou JavaScript.
