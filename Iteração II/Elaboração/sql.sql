CREATE DATABASE vacademico;

USE vacademico;

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

CREATE TABLE Aluno (
	id INTEGER NOT NULL AUTO_INCREMENT,
	curso VARCHAR(30),
	matricula VARCHAR(20),
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
	UNIQUE KEY (disc_id, codigo),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Inscrição (
	id INTEGER NOT NULL AUTO_INCREMENT,
	aluno_id INTEGER NOT NULL,
	disc_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (aluno_id) REFERENCES Aluno (id),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Calendario (
	id INTEGER NOT NULL AUTO_INCREMENT,
	disc_id INTEGER NOT NULL,
	nome VARCHAR (20) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (disc_id, nome),
	FOREIGN KEY (disc_id) REFERENCES Disciplina (id)
) ENGINE=InnoDB;

CREATE TABLE Aula (
	id INTEGER NOT NULL AUTO_INCREMENT,
	conteudo VARCHAR(1000),
	dataHora DATETIME NOT NULL,
	cal_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (cal_id, dataHora),
	FOREIGN KEY (cal_id) REFERENCES Calendario (id)
) ENGINE=InnoDB;

CREATE TABLE Frequencia (
	id INTEGER NOT NULL AUTO_INCREMENT,
	presente boolean NOT NULL DEFAULT 1,
	aluno_id INTEGER NOT NULL,
	aula_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (aluno_id) REFERENCES Aluno (id),
	FOREIGN KEY (aula_id) REFERENCES Aula (id)
) ENGINE=InnoDB;

CREATE TABLE Avaliacao (
	id INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	peso DOUBLE,
	etapa_id INTEGER NOT NULL,
	aula_id INTEGER,
	PRIMARY KEY (id),
	UNIQUE KEY (etapa_id, aula_id, nome),
	FOREIGN KEY (etapa_id) REFERENCES Etapa (id),
	FOREIGN KEY (aula_id) REFERENCES Aula (id)
) ENGINE=InnoDB;

CREATE TABLE Resultado (
	id INTEGER NOT NULL AUTO_INCREMENT,
	nota DOUBLE,
	aval_id INTEGER NOT NULL,
	aluno_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (aval_id) REFERENCES Avaliacao (id),
	FOREIGN KEY (aluno_id) REFERENCES Aluno (id)
) ENGINE=InnoDB;

CREATE TABLE Medias (
	id INTEGER NOT NULL AUTO_INCREMENT,
	media DOUBLE,
	aluno_id INTEGER NOT NULL,
	etapa_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (aluno_id, etapa_id),
	FOREIGN KEY (aluno_id) REFERENCES Aluno (id),
	FOREIGN KEY (etapa_id) REFERENCES Etapa (id)
) ENGINE=InnoDB;


delimiter |
	CREATE TRIGGER gerarMedia AFTER INSERT ON Inscricao
		FOR EACH ROW
		BEGIN
			DECLARE etapa_id INT;
			DECLARE aluno_id INT;

			SET etapa_id = SELECT id FROM Etapa WHERE Etapa.disc_id = NEW.disc_id;
			SET aluno_id = NEW.aluno_id;

			INSERT INTO Medias VALUES (NULL, 0.00, aluno_id, etapa_id); 
		END;
	|


	CREATE TRIGGER calcMedia AFTER INSERT ON Resultado
		FOR EACH ROW
		BEGIN
			DECLARE peso DOUBLE;
			DECLARE nota DOUBLE;
			DECLARE aluno_id INT;
			DECLARE etapa_id INT;
			DECLARE mediaAnterior DOUBLE;

			SET peso = SELECT peso FROM Avaliacao WHERE Avaliacao.id = NEW.aval_id;
			SET nota = NEW.nota;
			SET aluno_id = NEW.aluno_id;
			SET etapa_id = SELECT etapa_id FROM Avaliacao WHERE Avaliacao.id = NEW.aval_id;  
			SET mediaAnterior = SELECT media FROM Medias WHERE aluno_id = aluno_id AND etapa_id = etapa_id;

			UPDATE Medias SET media = (mediaAnterior + nota * peso / 10) WHERE aluno_id = aluno_id AND etapa_id = etapa_id;
		END;
	|
delimiter ;


INSERT INTO Pessoa VALUES
	(NULL, "Bilbo Baggins", "bilbo@gmail.com", "12345", 12345),
    (NULL, "Thorin Oakenshield", "thorin@gmail.com", "1212", 1212),
    (NULL, "Gandalf", "gandalf@gmail.com", "666", 666)
;

INSERT INTO Professor (id) VALUES (1), (2), (3);

INSERT INTO Disciplina VALUES
	(NULL, "Disciplina Teste I", 60, "ES.DT1", 1),
	(NULL, "Disciplina Teste I", 60, "EM.DT1", 1),
	(NULL, "Disciplina para Testes", 60, "EM.DPT", 2)
;

INSERT INTO Etapa VALUES 
	(NULL, "E1", 1),
	(NULL, "E1", 2),
	(NULL, "E1", 3)
;

INSERT INTO Calendario VALUES
	(NULL, 1, "ADS2012"),
	(NULL, 2, "TEC2014"),
	(NULL, 3, "TEC2014")
;

INSERT INTO Aula VALUES 
	(NULL, NULL, "2014-05-05 19:00:00", 1),
	(NULL, NULL, "2014-05-10 19:00:00", 1),
	(NULL, NULL, "2014-05-13 19:00:00", 1),
	(NULL, NULL, "2014-05-15 19:00:00", 1),
	(NULL, NULL, "2014-05-20 19:00:00", 1),
	(NULL, NULL, "2014-05-23 19:00:00", 1),
	(NULL, NULL, "2014-05-05 10:00:00", 2),
	(NULL, NULL, "2014-05-10 09:00:00", 2),
	(NULL, NULL, "2014-05-13 10:00:00", 2),
	(NULL, NULL, "2014-05-15 09:00:00", 2),
	(NULL, NULL, "2014-05-05 09:00:00", 3),
	(NULL, NULL, "2014-05-10 10:00:00", 3),
	(NULL, NULL, "2014-05-13 09:00:00", 3),
	(NULL, NULL, "2014-05-15 10:00:00", 3)
;