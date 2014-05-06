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
	PRIMARY KEY (id, disc_id),
	UNIQUE KEY (codigo),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Calendario (
	id INTEGER NOT NULL AUTO_INCREMENT,
	disc_id INTEGER NOT NULL,
	nome VARCHAR (20) NOT NULL,
	PRIMARY KEY (id, disc_id),
	UNIQUE KEY (nome),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Aula (
	id INTEGER NOT NULL AUTO_INCREMENT,
	conteudo VARCHAR(1000),
	dataHora DATETIME NOT NULL,
	cal_id INTEGER NOT NULL,
	cal_disc_id INTEGER NOT NULL,
	PRIMARY KEY (id, cal_id, cal_disc_id),
	UNIQUE KEY (dataHora),
	FOREIGN KEY (cal_id, cal_disc_id) REFERENCES Calendario (id, disc_id)
) ENGINE=InnoDB;