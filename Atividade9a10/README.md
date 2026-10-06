# Estoque do Mercado - Atividades 9 a 10

## Objetivo

Sistema simples para controlar os produtos em estoque de um mercado.
Permite cadastrar, listar, editar e excluir produtos com nome, categoria, descrição, preço, quantidade e data de validade.

## Tecnologias e requisitos

- PHP 8 com as extensões mysqli e mbstring.
- MySQL ou MariaDB.
- Apache e navegador.
- XAMPP pode ser usado para reunir o PHP, Apache, banco e phpMyAdmin.

Não utiliza frameworks, Composer, JavaScript ou bibliotecas externas.

## Instalação e configuração

1. Coloque o repositório na pasta htdocs do XAMPP.
2. No painel do XAMPP, inicie Apache e MySQL.
3. Abra [phpMyAdmin](http://localhost:8080/phpmyadmin/).
4. Clique em Importar, escolha o arquivo [banco.sql](banco.sql) desta pasta e execute.
5. Confira os dados da conexão em [conexao.php](conexao.php):

| Configuração | Valor usado |
| --- | --- |
| Servidor | localhost |
| Porta do MySQL | 3306 |
| Usuário | root |
| Senha | vazia |
| Banco | gestao_estoque_rec |

Se o seu MySQL tiver outra senha ou usuário, altere esses valores na chamada new mysqli do arquivo conexao.php.

6. Neste computador, abra [Estoque do Mercado](http://localhost:8080/henrique_salvador_2026/Atividades-REC/Atividade9a10/).

O Apache deste computador usa a porta 8080. Caso use a porta 80, retire :8080 dos links.
Se copiar o projeto para outra pasta, ajuste o caminho do endereço.
Abra pelo servidor local, e não com duplo clique no arquivo PHP.

O arquivo SQL cria o banco e a tabela sem apagar dados existentes. Não inclui produtos de exemplo.
O banco desta atividade é separado do banco de brinquedos da Atividade6a8.

## Estrutura dos arquivos

| Arquivo | Responsabilidade |
| --- | --- |
| banco.sql | Criação do banco e da tabela |
| conexao.php | Conexão com MySQL e tratamento de falha na conexão |
| funcoes.php | Recebimento e validação dos dados, token e escape de texto |
| formulario.php | Campos compartilhados pelo cadastro e pela edição |
| index.php | Lista todos os produtos |
| cadastrar.php | Cadastra um produto |
| editar.php | Busca e atualiza um produto |
| excluir.php | Confirma e exclui um produto |
| estilo.css | Aparência das páginas |
| CASOS_DE_USO.md | Atores, ações e fluxos do sistema |
| casos-de-uso.svg | Diagrama de casos de uso |

## Estrutura do banco de dados

Banco: **gestao_estoque_rec**. Tabela: **produtos**.

| Campo | Tipo | Descrição |
| --- | --- | --- |
| id | INT, chave primária, AUTO_INCREMENT | Identificação automática |
| nome | VARCHAR(100), obrigatório | Nome do produto |
| categoria | VARCHAR(60), obrigatório | Ex.: alimentos, bebidas, limpeza |
| descricao | VARCHAR(1000), obrigatório | Informações sobre o produto |
| preco | DECIMAL(10,2), obrigatório | Preço em reais |
| quantidade | INT, obrigatório | Quantidade em estoque |
| data_validade | DATE, obrigatório | Validade no formato ano-mês-dia |

## Principais funcionalidades

### Cadastrar

Clique em Cadastrar produto, preencha todos os campos e pressione Salvar.
Após o cadastro, o sistema volta à lista e mostra uma mensagem de sucesso.

### Visualizar e listar

A página inicial mostra todos os campos dos produtos, com preço em reais e validade no formato dia/mês/ano.
Se não houver registros, mostra uma mensagem de estoque vazio.
Os produtos mais recentemente cadastrados aparecem primeiro.

### Editar

Clique em Editar na linha desejada, altere os campos e pressione Salvar.
Cancelar retorna à lista sem gravar mudanças.

### Excluir

Clique em Excluir. A próxima página mostra o nome do produto e pede confirmação.
Somente Confirmar exclusão remove o registro. Cancelar retorna à lista.

## Validação, segurança e erros

- Nome, categoria e descrição são obrigatórios e respeitam os limites da tabela.
- O preço deve estar entre zero e 99999999,99, com no máximo duas casas decimais.
- A quantidade deve ser inteira, entre zero e 2147483647.
- A validade deve existir no calendário, com ano de 1000 a 9999. Datas vencidas são aceitas para permitir o controle de produtos que já estão no estoque.
- Um ID inválido ou inexistente recebe uma mensagem, sem alterar registros.
- Todas as consultas PHP usam Prepared Statements, inclusive a listagem. Os valores recebidos são enviados por bind_param.
- O preço é enviado como texto decimal para manter a precisão do campo DECIMAL.
- Os valores exibidos passam por htmlspecialchars, para que o conteúdo seja tratado como texto.
- Cadastro, edição e exclusão usam POST e token de sessão.
- Falhas no banco mostram uma mensagem simples ao usuário; o detalhe técnico fica no log do PHP.
- O projeto não implementa login ou perfis de acesso. O ator previsto é o funcionário responsável pelo estoque.

Se aparecer erro de conexão, confira se o MySQL está ligado, se o SQL foi importado e se os dados de conexao.php estão corretos.

## Casos de uso

Consulte [documentação dos casos de uso](CASOS_DE_USO.md) e [diagrama em SVG](casos-de-uso.svg).
O SVG pode ser aberto diretamente em um navegador.

## Versionamento

O histórico registra separadamente banco, conexão, validação, interface, operações CRUD e documentação.
Os arquivos desta atividade ficam em Atividade9a10, dentro do repositório Atividades-REC.
