# Atividades 3 a 5 - PHP

Resolução das duas listas de exercícios da recuperação.

## Organização

- lista1: exercícios 1 a 15 e o desafio de processamento de pedidos.
- lista2: exercícios 16 a 18 da lista Extra.
- index.php: página com os links de todos os exercícios.

Cada exercício tem um arquivo funcoes.php com a lógica e um index.php com exemplos e resultados. As páginas são independentes, pois algumas listas usam os mesmos nomes de funções.

## Como abrir

1. Inicie o Apache no XAMPP.
2. Abra http://localhost/henrique_salvador_2026/Atividades-REC/Atividade3a5/
3. Clique no exercício desejado.

Os exemplos já possuem valores definidos no index.php. Para experimentar outros valores, altere as variáveis nesse arquivo. Os exercícios 12 e 18 também possuem formulários para pesquisar produtos e pacientes.

Utiliza PHP 8 e a extensão mbstring, disponível neste XAMPP, para trabalhar com acentos. Não precisa de banco de dados, Composer ou bibliotecas externas.

## Critérios usados

- Exercício 3: retira pontos, traço e espaços do CPF antes de mascarar; exige 11 dígitos, sem validar os dígitos verificadores.
- Exercícios 4 e 15: a senha gerada precisa ter pelo menos 4 caracteres para incluir os quatro grupos.
- Exercício 10: média a partir de 7 aprova; de 5 até menos de 7 fica em recuperação; abaixo de 5 reprova.
- Exercício 13: deslocamento de 3 letras na Cifra de César, alterando A-Z e a-z. Acentos e pontuação são preservados.
- Exercício 14: a classificação par/ímpar considera apenas números inteiros.
- Exercício 15: a cotação de moeda é um exemplo fixo; a idade e a saudação usam a data e o horário atuais.
- Exercício 16: menos de 8 caracteres é fraca. Com pelo menos 8, um grupo é fraca, dois são média, três são forte e quatro são muito forte. Espaços não contam como caracteres especiais.
- Exercício 17: ignora maiúsculas e pontuação na contagem das palavras. Repetições são as ocorrências depois da primeira. Em empates de tamanho, mantém a primeira palavra encontrada. Conta frases separadas por ponto, interrogação ou exclamação.
- Exercício 18: organiza por data e horário e mostra o primeiro e o último atendimento de cada dia. Horário duplicado significa a mesma data e hora. Datas usam ano-mês-dia e horários usam hora:minuto.
- Desafio: calcula o frete sobre o total antes do desconto. Cada linha representa um produto, com sua quantidade total. Um pedido vazio tem valor final zero.

## Verificação

As funções foram executadas com exemplos e casos de limite, incluindo divisão por zero, listas vazias, textos com acentos, limites de descontos e fretes, classificação de senhas e consultas em datas diferentes. Todos os arquivos PHP foram verificados com php -l.
