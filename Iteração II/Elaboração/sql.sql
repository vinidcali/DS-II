CREATE DATABASE vacademico;

USE vacademico;

CREATE TABLE Pessoa (
	id INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	email VARCHAR(20),
	senha VARCHAR(50),
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

CREATE TABLE Inscricao (
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

CREATE TABLE Resultados (
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
	CREATE TRIGGER gerarMediaEfreq AFTER INSERT ON Inscricao
		FOR EACH ROW
		BEGIN
			DECLARE id_etapa INT;
			DECLARE id_aula INT;
			DECLARE ok INT DEFAULT false;
			DECLARE cur CURSOR FOR SELECT Aula.id FROM Aula WHERE cal_id = (SELECT id FROM Calendario WHERE disc_id = NEW.disc_id);
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET ok = TRUE;

			OPEN cur;
		        loopAulas: LOOP
		            FETCH cur INTO id_aula;
		            IF ok THEN
		                LEAVE loopAulas;
		            END IF;
		            INSERT INTO Frequencia VALUES (NULL, 1, NEW.aluno_id, id_aula); 
		        END LOOP;
		    CLOSE cur;


			SET id_etapa = (SELECT id FROM Etapa WHERE Etapa.disc_id = NEW.disc_id);
			INSERT INTO Medias VALUES (NULL, 0.00, NEW.aluno_id, id_etapa); 
		END;
	|

	CREATE TRIGGER gerarFrequencia AFTER INSERT ON Inscricao
		FOR EACH ROW
		BEGIN
			DECLARE id_aula INT;
			DECLARE ok INT DEFAULT false;
			DECLARE cur CURSOR FOR SELECT Aula.id FROM Aula WHERE cal_id = (SELECT id FROM Calendario WHERE disc_id = NEW.disc_id);
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET ok = TRUE;

		    OPEN cur;
		        loopAulas: LOOP
		            FETCH cur INTO id_aula;
		            IF ok THEN
		                LEAVE loopAulas;
		            END IF;
		            INSERT INTO Frequencia VALUES (NULL, 1, NEW.aluno_id, id_aula); 
		        END LOOP;
		    CLOSE cur;
		END;
	|

	CREATE TRIGGER gerarResultados AFTER INSERT ON Avaliacao
		FOR EACH ROW
		BEGIN
			DECLARE ok INT DEFAULT false;
			DECLARE id_aluno INT;
			DECLARE cur CURSOR FOR SELECT aluno_id FROM Inscricao WHERE disc_id = (SELECT disc_id FROM Etapa WHERE id = NEW.etapa_id);
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET ok = true;

		    OPEN cur;
		        loopAlunos: LOOP
		            FETCH cur INTO id_aluno;
		            IF ok THEN
		                LEAVE loopAlunos;
		            END IF;
		            INSERT INTO Resultados VALUES (NULL, 0.00, NEW.id, id_aluno); 
		        END LOOP;
		    CLOSE cur;
		END;
	|

	CREATE TRIGGER apagarResultados BEFORE DELETE ON Avaliacao
		FOR EACH ROW
		BEGIN
			DECLARE ok INT DEFAULT false;
			DECLARE id_aluno INT;
			DECLARE cur CURSOR FOR SELECT aluno_id FROM Inscricao WHERE disc_id = (SELECT disc_id FROM Etapa WHERE id = OLD.etapa_id);
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET ok = true;

		    OPEN cur;
		        loopAlunos: LOOP
		            FETCH cur INTO id_aluno;
		            IF ok THEN
		                LEAVE loopAlunos;
		            END IF;
		            DELETE FROM Resultados WHERE aluno_id = id_aluno AND aval_id = OLD.id; 
		        END LOOP;
		    CLOSE cur;
		END;
	|

	CREATE TRIGGER calcMedia AFTER UPDATE ON Resultados
		FOR EACH ROW
		BEGIN
			DECLARE ppeso DOUBLE;
			DECLARE nota DOUBLE;
			DECLARE aluno INT;
			DECLARE etapa INT;
			DECLARE mediaAnterior DOUBLE;
			DECLARE mediaDesteRes DOUBLE;

			SET ppeso = (SELECT peso FROM Avaliacao WHERE Avaliacao.id = NEW.aval_id);
			SET nota = NEW.nota;
			SET aluno = NEW.aluno_id;
			SET etapa = (SELECT etapa_id FROM Avaliacao WHERE Avaliacao.id = NEW.aval_id);  
			SET mediaAnterior = (SELECT media FROM Medias WHERE aluno_id = aluno AND etapa_id = etapa);
			SET mediaDesteRes = mediaAnterior + nota * ppeso / 10;

			UPDATE Medias SET media = mediaDesteRes WHERE aluno_id = aluno AND etapa_id = etapa;
		END;
	|
delimiter ;


INSERT INTO Pessoa VALUES
	(NULL, "Bilbo Baggins", "bilbo@gmail.com", "12345", 12345),
    (NULL, "Elrond Half-elven", "elrond@gmail.com", "1212", 1212),
    (NULL, "Gandalf", "gandalf@gmail.com", "666", 666),
    (NULL, "Fili", NULL, NULL, 1111),
    (NULL, "Kili", NULL, NULL, 2222),
    (NULL, "Ori", NULL, NULL, 3333),
    (NULL, "Nori", NULL, NULL, 4444),
    (NULL, "Dori", NULL, NULL, 5555),
    (NULL, "Oin", NULL, NULL, 6666),
    (NULL, "Gloin", NULL, NULL, 7777),
    (NULL, "Legolas", NULL, NULL, 242424)
;

INSERT INTO Professor (id) VALUES (1), (2), (3);
INSERT INTO Aluno (id) VALUES (4), (5), (6), (7), (8), (9), (10);

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

INSERT INTO Inscricao VALUES
	(NULL, 4, 1),
	(NULL, 5, 2),
	(NULL, 6, 2),
	(NULL, 7, 1),
	(NULL, 8, 1),
	(NULL, 9, 3),
	(NULL, 10, 1)
;

INSERT INTO Avaliacao VALUES 
	(NULL, "Prova 1", 2.5, 1, NULL),
	(NULL, "Trabalho em grupo", 4, 1, 6),
	(NULL, "Dever de casa", 0.5, 2, NULL),
	(NULL, "Prova 1", 2, 3, NULL)
;

INSERT INTO Resultados VALUES
	(NULL, 8, 1, 4),
	(NULL, 10, 1, 7),
	(NULL, 5, 1, 8),
	(NULL, 3, 1, 10),
;