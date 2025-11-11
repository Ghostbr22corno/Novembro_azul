CREATE DATABASE novembro_azul;
USE novembro_azul;

CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    idade INT NOT NULL,
    data_consulta DATE NOT NULL
);