CREATE DATABASE IF NOT EXISTS gestaosala;

USE gestaosala;

CREATE TABLE usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario VARCHAR(100) NOT NULL UNIQUE,

    senha VARCHAR(255) NOT NULL
);

CREATE TABLE salas (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(50) NOT NULL,

    bloco VARCHAR(10) NOT NULL,

    andar INT NOT NULL,

    capacidade INT,

    status VARCHAR(20) DEFAULT 'Disponível'
);

CREATE TABLE turmas (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    curso VARCHAR(100),

    periodo VARCHAR(20)
);

CREATE TABLE periodos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(50),

    horario_inicio TIME,

    horario_fim TIME
);

CREATE TABLE reservas (

    id INT AUTO_INCREMENT PRIMARY KEY,

    sala_id INT NOT NULL,

    turma_id INT NOT NULL,

    usuario_id INT NOT NULL,

    data_reserva DATE NOT NULL,

    periodo_id INT NOT NULL,

    status VARCHAR(20) DEFAULT 'Reservado',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (sala_id) REFERENCES salas(id),

    FOREIGN KEY (turma_id) REFERENCES turmas(id),

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),

    FOREIGN KEY (periodo_id) REFERENCES periodos(id)
);

INSERT INTO usuarios (usuario, senha) VALUES

(
    'admin',

    '$2y$10$7yDVcF87aJHvSNEcstvVouzVfUK/8fSYFUjOl2zWCA1k508cpzApS'
);

INSERT INTO salas (nome, bloco, andar, capacidade) VALUES

('B101', 'B', 1, 40),
('B102', 'B', 1, 35),
('B103', 'B', 1, 50),

('B201', 'B', 2, 40),
('B202', 'B', 2, 35),
('B203', 'B', 2, 50),

('B301', 'B', 3, 40),
('B302', 'B', 3, 35),
('B303', 'B', 3, 50);

INSERT INTO turmas (nome, curso, periodo) VALUES

('ADS 1', 'Análise e Desenvolvimento de Sistemas', 'Noturno'),
('ADS 2', 'Análise e Desenvolvimento de Sistemas', 'Noturno'),
('ENG 1', 'Engenharia', 'Matutino');

INSERT INTO periodos (nome, horario_inicio, horario_fim) VALUES

('1° Período', '18:50:00', '19:40:00'),
('2° Período', '19:40:00', '20:30:00'),
('3° Período', '20:50:00', '21:40:00'),
('4° Período', '21:40:00', '22:30:00');