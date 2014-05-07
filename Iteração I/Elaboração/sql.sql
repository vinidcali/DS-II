CREATE TABLE Pessoa (
	id INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	email VARCHAR(20),
	senha VARCHAR(50) NOT NULL,
	cpf INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (cpf)
) ENGINE=InnoDB;

CREATE TABLE Professor (
	id INTEGER NOT NULL,
	titulo ENUM('Mestre(a)', 'Doutor(a)'),
	area VARCHAR(30),
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Pessoa (id)
) ENGINE=InnoDB;

CREATE TABLE Disciplina (
	id INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(20) NOT NULL,
	creditos INTEGER,
	codigo VARCHAR(20) NOT NULL,
	prof_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (codigo),
	FOREIGN KEY (prof_id) REFERENCES Professor (id)
) ENGINE=InnoDB;

CREATE TABLE Etapa (
	id INTEGER NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(20) NOT NULL,
	disc_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (codigo),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Calendario (
	id INTEGER NOT NULL AUTO_INCREMENT,
	disc_id INTEGER NOT NULL,
	nome VARCHAR (20) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (nome),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Aula (
	id INTEGER NOT NULL AUTO_INCREMENT,
	conteudo VARCHAR(1000),
	dataHora DATETIME NOT NULL,
	cal_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (dataHora),
	FOREIGN KEY (cal_id) REFERENCES Calendario (id)
) ENGINE=InnoDB;


INSERT INTO Pessoa VALUES
	(NULL, "Pessoa 1", "p1@gmail.com", "p1", 00001),
    (NULL, "Pessoa 2", "p2@gmail.com", "p2", 00002),
    (NULL, "Pessoa 3", "p2@gmail.com", "p3", 00003)
;

INSERT INTO Professor (id) VALUES (1), (2);

INSERT INTO Disciplina VALUES
	(NULL, "Banco de Dados I", NULL, "ES.BD1", 1),
	(NULL, "Programação I", 60, "EM.P1", 2)
;

INSERT INTO Calendario VALUES
	(NULL, 1, "ADS2012"),
	(NULL, 2, "TEC2014")
;

INSERT INTO Aula VALUES 
	(NULL, NULL, "2014-05-05 19:00:00", 1),
	(NULL, NULL, "2014-05-10 19:00:00", 1),
	(NULL, NULL, "2014-05-13 19:00:00", 1),
	(NULL, NULL, "2014-05-15 19:00:00", 1),
	(NULL, NULL, "2014-05-05 09:00:00", 2),
	(NULL, NULL, "2014-05-10 09:00:00", 2),
	(NULL, NULL, "2014-05-13 09:00:00", 2)
;