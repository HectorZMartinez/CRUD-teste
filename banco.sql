create database	atividade01;
use atividade01;
CREATE TABLE usuario (
    idusuario int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    email varchar(255) UNIQUE,
    senha varchar(255)
);

CREATE TABLE contatos (
    idcontato INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    numero VARCHAR(20),
    endereco VARCHAR(255),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES usuario (idusuario)
);