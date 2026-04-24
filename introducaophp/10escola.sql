CREATE DATABASE escola_paulo;

USE escola_paulo;

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(70),
    idade TINYINT UNSIGNED,
    uf CHAR(2),
    cidade VARCHAR(50)
);

INSERT INTO alunos (nome, idade, uf, cidade) 
VALUES
('Paulo Vitor',20,'SP', 'Marília'),
('Bruno Tadeu',23,'SP', 'Marília'),
('João Pedro',21,'SP', 'Marília');

SELECT nome,idade,uf,cidade FROM alunos;