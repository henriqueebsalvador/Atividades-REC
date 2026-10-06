CREATE DATABASE IF NOT EXISTS gestao_estoque_rec
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE gestao_estoque_rec;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(60) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    data_validade DATE NOT NULL
);
