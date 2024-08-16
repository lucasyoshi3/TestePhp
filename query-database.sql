CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(100),
    idade INT,
    datacadastro DATETIME NOT NULL,
    cep VARCHAR(10),
    rua VARCHAR(255),
    bairro VARCHAR(100),
    estado VARCHAR(100)
);