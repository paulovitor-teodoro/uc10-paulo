CREATE DATABASE loja;

USE loja;
 
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY
    nome VARCHAR(100),
    preco DECIMAL (10,2),
    estoque INT
);    

INSERT INTO `produtos` (`nome`, `preco`, `estoque`) 	
	VALUES
		( 'Camiseta', 100.00, 10),
		( 'Calça', 70.00, 5),
		( 'Tenis', 149.99, 3);


SELECT nome , preco , estoque FROM produtos ;
