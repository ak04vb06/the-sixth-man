-- The Sixth Man: database schema and demo data
-- Season 2026-27: results of 2 and 4 November 2026, standings as of 5 November 2026.
-- Import with phpMyAdmin (Import tab) or: mysql -u root < database/sixthman.sql

CREATE DATABASE IF NOT EXISTS sixthman CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sixthman;
SET NAMES utf8mb4;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS parciais, jogos, noticias, clubes, utilizadores;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE clubes (
  clubeId INT AUTO_INCREMENT PRIMARY KEY,
  clubeNome VARCHAR(45) NOT NULL,
  clubeSobrenome VARCHAR(45) NOT NULL,
  clubeSigla CHAR(3) NOT NULL,
  clubeCor CHAR(7) NOT NULL DEFAULT '#1B2A4A',
  clubeConferencia ENUM('west','east') NOT NULL DEFAULT 'west',
  -- Season record before the first game registered on the site (lets the site start mid-season)
  clubeVitoriasBase INT NOT NULL DEFAULT 0,
  clubeDerrotasBase INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE jogos (
  jogoId INT AUTO_INCREMENT PRIMARY KEY,
  jogoData DATE NOT NULL,
  jogoResultadoCasa INT NOT NULL DEFAULT 0,
  jogoResultadoFora INT NOT NULL DEFAULT 0,
  jogoCasaClubeId INT NOT NULL,
  jogoForaClubeId INT NOT NULL,
  KEY idx_jogos_data (jogoData),
  CONSTRAINT fk_jogos_casa FOREIGN KEY (jogoCasaClubeId) REFERENCES clubes (clubeId),
  CONSTRAINT fk_jogos_fora FOREIGN KEY (jogoForaClubeId) REFERENCES clubes (clubeId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE parciais (
  parcialId INT AUTO_INCREMENT PRIMARY KEY,
  parcialQuarto ENUM('q1','q2','q3','q4') NOT NULL,
  parcialCasaPontos INT NOT NULL DEFAULT 0,
  parcialForaPontos INT NOT NULL DEFAULT 0,
  parcialJogoId INT NOT NULL,
  UNIQUE KEY uq_parcial (parcialJogoId, parcialQuarto),
  CONSTRAINT fk_parciais_jogo FOREIGN KEY (parcialJogoId) REFERENCES jogos (jogoId) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE noticias (
  noticiaId INT AUTO_INCREMENT PRIMARY KEY,
  noticiaTitulo VARCHAR(255) NOT NULL,
  noticiaData DATE NOT NULL,
  noticiaImagemURL VARCHAR(255) NOT NULL DEFAULT '',
  noticiaResumo TEXT NOT NULL,
  noticiaCorpo TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE utilizadores (
  utilizadorId INT AUTO_INCREMENT PRIMARY KEY,
  utilizadorNome VARCHAR(60) NOT NULL UNIQUE,
  utilizadorPassword VARCHAR(255) NOT NULL,
  criadoEm TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO clubes (clubeId, clubeNome, clubeSobrenome, clubeSigla, clubeCor, clubeConferencia, clubeVitoriasBase, clubeDerrotasBase) VALUES
(1, 'Chicago', 'Bulls', 'CHI', '#CE1141', 'east', 1, 6),
(2, 'Boston', 'Celtics', 'BOS', '#007A33', 'east', 5, 1),
(5, 'Miami', 'Heat', 'MIA', '#98002E', 'east', 2, 4),
(6, 'Memphis', 'Grizzlies', 'MEM', '#5D76A9', 'west', 6, 1),
(7, 'Milwaukee', 'Bucks', 'MIL', '#00471B', 'east', 1, 6),
(8, 'Philadelphia', '76ers', 'PHI', '#006BB6', 'east', 7, 1),
(9, 'Toronto', 'Raptors', 'TOR', '#CE1141', 'east', 3, 3),
(11, 'Atlanta', 'Hawks', 'ATL', '#E03A3E', 'east', 4, 4),
(12, 'Cleveland', 'Cavaliers', 'CLE', '#860038', 'east', 4, 3),
(13, 'Charlotte', 'Hornets', 'CHA', '#1D1160', 'east', 3, 5),
(14, 'New York', 'Knicks', 'NYK', '#F58426', 'east', 3, 4),
(15, 'Washington', 'Wizards', 'WAS', '#002B5C', 'east', 4, 3),
(16, 'Indiana', 'Pacers', 'IND', '#002D62', 'east', 2, 6),
(17, 'Detroit', 'Pistons', 'DET', '#C8102E', 'east', 6, 1),
(18, 'Orlando', 'Magic', 'ORL', '#0077C0', 'east', 2, 5),
(19, 'Phoenix', 'Suns', 'PHX', '#E56020', 'west', 1, 3),
(20, 'Golden State', 'Warriors', 'GSW', '#1D428A', 'west', 4, 3),
(21, 'Dallas', 'Mavericks', 'DAL', '#00538C', 'west', 4, 3),
(22, 'Utah', 'Jazz', 'UTA', '#3E2680', 'west', 1, 5),
(23, 'Denver', 'Nuggets', 'DEN', '#0E2240', 'west', 3, 2),
(24, 'Minnesota', 'Timberwolves', 'MIN', '#236192', 'west', 5, 3),
(25, 'New Orleans', 'Pelicans', 'NOP', '#85714D', 'west', 3, 4),
(26, 'Los Angeles', 'Clippers', 'LAC', '#C8102E', 'west', 1, 5),
(27, 'San Antonio', 'Spurs', 'SAS', '#636466', 'west', 4, 2),
(28, 'Los Angeles', 'Lakers', 'LAL', '#552583', 'west', 5, 2),
(29, 'Sacramento', 'Kings', 'SAC', '#5A2D81', 'west', 1, 6),
(30, 'Portland', 'Trail Blazers', 'POR', '#E03A3E', 'west', 4, 1),
(31, 'Oklahoma City', 'Thunder', 'OKC', '#007AC1', 'west', 5, 2),
(32, 'Houston', 'Rockets', 'HOU', '#CE1141', 'west', 6, 1),
(33, 'Brooklyn', 'Nets', 'BKN', '#3A3A3A', 'east', 1, 6);

INSERT INTO jogos (jogoId, jogoData, jogoResultadoCasa, jogoResultadoFora, jogoCasaClubeId, jogoForaClubeId) VALUES
(1, '2026-11-02', 109, 93, 32, 2),
(2, '2026-11-02', 119, 97, 27, 22),
(3, '2026-11-02', 110, 118, 23, 30),
(4, '2026-11-02', 138, 117, 28, 5),
(5, '2026-11-02', 118, 125, 26, 9),
(6, '2026-11-02', 116, 113, 20, 19),
(7, '2026-11-04', 105, 120, 15, 11),
(8, '2026-11-04', 106, 112, 17, 8),
(9, '2026-11-04', 114, 104, 33, 13),
(10, '2026-11-04', 109, 102, 2, 7),
(11, '2026-11-04', 135, 105, 14, 1),
(12, '2026-11-04', 120, 113, 25, 22),
(13, '2026-11-04', 103, 107, 6, 16),
(14, '2026-11-04', 124, 116, 31, 12),
(15, '2026-11-04', 107, 117, 32, 24),
(16, '2026-11-04', 128, 109, 23, 9),
(17, '2026-11-04', 119, 132, 19, 30),
(18, '2026-11-04', 112, 111, 27, 21),
(19, '2026-11-04', 103, 116, 29, 28),
(20, '2026-11-04', 116, 117, 26, 5);

INSERT INTO parciais (parcialQuarto, parcialCasaPontos, parcialForaPontos, parcialJogoId) VALUES
('q1', 28, 28, 19),
('q2', 26, 33, 19),
('q3', 20, 26, 19),
('q4', 29, 29, 19);


INSERT INTO noticias (noticiaTitulo, noticiaData, noticiaImagemURL, noticiaResumo, noticiaCorpo) VALUES
('Dončić marca 40 pontos na vitória dos Lakers em Sacramento', '2026-11-05', '',
 'Os Lakers venceram os Kings por 116-103 e somam sete vitórias em nove jogos.',
 'Luka Dončić terminou com 40 pontos, 9 ressaltos e 7 assistências. Converteu 6 dos 13 triplos que tentou e 12 de 13 lances livres.\n\nAustin Reaves juntou 21 pontos. Os Lakers ganharam o segundo período por 33-26 e nunca mais perderam a liderança.\n\nEm Sacramento, Zach LaVine marcou 21 pontos e Domantas Sabonis fez um duplo-duplo com 16 pontos e 17 ressaltos. Os Kings caem para 1-7.'),
('76ers lideram o Este depois de vencerem em Detroit', '2026-11-05', '',
 'Philadelphia ganhou por 112-106 e tem o melhor registo da liga: oito vitórias em nove jogos.',
 'Os 76ers venceram os Pistons por 112-106 e seguem isolados no primeiro lugar da Conferência Este, com 8-1.\n\nDetroit continua em segundo, com 6-2, mas sofreu apenas a segunda derrota da época.'),
('Trail Blazers no topo do Oeste', '2026-11-05', '',
 'Portland venceu em Denver e em Phoenix e lidera a Conferência Oeste com 6-1.',
 'Os Trail Blazers ganharam por 118-110 em Denver na segunda-feira e por 132-119 em Phoenix na quarta-feira.\n\nCom seis vitórias em sete jogos, Portland passa à frente dos Lakers e dos Rockets, ambos com 7-2.'),
('Knicks vencem os Bulls por 30 pontos', '2026-11-05', '',
 'Nova Iorque ganhou por 135-105 e volta ao equilíbrio, com 4-4.',
 'Os Knicks dominaram os Bulls no Madison Square Garden e venceram por 135-105.\n\nChicago soma a sétima derrota em oito jogos e está no penúltimo lugar da Conferência Este.');
