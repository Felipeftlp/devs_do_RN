CREATE DATABASE devs_do_rn;

\c devs_do_rn;

CREATE TABLE associados (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    data_filiacao DATE NOT NULL
);

CREATE TABLE anuidades (
    id SERIAL PRIMARY KEY,
    ano SMALLINT NOT NULL,
    valor DECIMAL NOT NULL
);

CREATE TABLE pagamentos (
    id SERIAL PRIMARY KEY,
    associado_id INT NOT NULL,
    anuidade_id INT NOT NULL,
    pago BOOLEAN DEFAULT FALSE,
    data_pagamento DATE,

    FOREIGN KEY (associado_id) REFERENCES Associados(id) ON DELETE CASCADE,
    FOREIGN KEY (anuidade_id) REFERENCES Anuidades(id) ON DELETE CASCADE
);