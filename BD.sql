DROP DATABASE IF EXISTS escuelatw;
create database escuelatw;
use escuelatw;

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
  IDAdmin int NOT NULL,
  usuario varchar(16) NOT NULL,
  contra varchar(16) NOT NULL,
  PRIMARY KEY (IDAdmin)
);

CREATE TABLE grupo (
  idGrupo int NOT NULL AUTO_INCREMENT,
  Nombre varchar(5) NOT NULL,
  horario datetime NOT NULL,
  salon varchar(5) NOT NULL,
  PRIMARY KEY (idGrupo)
);

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX1', '2021-08-02 09:00:00', '1104');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX2', '2021-08-02 09:00:00', '1105');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX3', '2021-08-02 09:00:00', '1106');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX4', '2021-08-02 09:00:00', '1107');

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX5', '2021-08-02 10:45:00', '1104');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX6', '2021-08-02 10:45:00', '1105');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX7', '2021-08-02 10:45:00', '1106');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX8', '2021-08-02 10:45:00', '1107');

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX9', '2021-08-02 12:30:00', '1104');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX10', '2021-08-02 12:30:00', '1105');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX11', '2021-08-02 12:30:00', '1106');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX12', '2021-08-02 12:30:00', '1107');

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX13', '2021-08-02 14:15:00', '1104');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX14', '2021-08-02 14:15:00', '1105');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX15', '2021-08-02 14:15:00', '1106');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX16', '2021-08-02 14:15:00', '1107');

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX17', '2021-08-02 16:00:00', '1104');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX18', '2021-08-02 16:00:00', '1105');
INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX19', '2021-08-02 16:00:00', '1106');

INSERT INTO grupo (Nombre, horario, salon) VALUES('1EX20', '2021-08-09 14:00:00', '1104');

CREATE TABLE registroalumnos (
  NoBoleta varchar(12) NOT NULL,
  Nombre varchar(45) NOT NULL,
  ApellidoPaterno varchar(45) NOT NULL,
  ApellidoMaterno varchar(45) NOT NULL,
  FechaNacimiento varchar(10) NOT NULL,
  Genero varchar(9) NOT NULL,
  CURP varchar(18) NOT NULL,
  CalleYNumero varchar(80) NOT NULL,
  Colonia varchar(80) NOT NULL,
  CodigoPostal varchar(5) NOT NULL,
  TelefonoOCelular varchar(10) NOT NULL,
  Correo varchar(45) NOT NULL,
  EscuelaProcedencia varchar(100) NOT NULL,
  EntidadFederativa varchar(45) NOT NULL,
  NombreEscuela varchar(45) NOT NULL,
  Promedio varchar(6) NOT NULL,
  OpcionEscom varchar(45) NOT NULL,
  idGrupo int NOT NULL,
  PRIMARY KEY (NoBoleta),
  FOREIGN KEY (idGrupo) REFERENCES grupo(idGrupo)
);

DELIMITER //

CREATE PROCEDURE inscribir (
IN NoBoleta varchar(12), 
IN Nombre varchar(45), 
IN ApellidoPaterno varchar(45),
IN ApellidoMaterno varchar(45),
IN FechaNacimiento varchar(10), 
IN Genero varchar(9),
IN CURP varchar(18),
IN CalleYNumero varchar(80),
IN Colonia varchar(80),
IN CodigoPostal varchar(5),
IN TelefonoOCelular varchar(10),
IN Correo varchar(45),
IN EscuelaProcedencia varchar(100),
IN EntidadFederativa varchar(45),
IN NombreEscuela varchar(45),
IN Promedio varchar(6),
IN OpcionEscom varchar(45)
)
BEGIN
  DECLARE grupo int DEFAULT 1;
  DECLARE inscritos int;
  DECLARE fecha DATE;

  SELECT CURDATE() INTO fecha;

  buscar_grupo : LOOP
    SELECT COUNT(*) INTO inscritos FROM registroalumnos WHERE idGrupo = grupo;

    IF(grupo = 21) THEN
      LEAVE buscar_grupo;
    END IF;

    IF ( fecha > '2021-08-02') THEN
		INSERT INTO registroalumnos VALUES (NoBoleta, 
                                          Nombre, 
                                          ApellidoPaterno, 
                                          ApellidoMaterno, 
                                          FechaNacimiento, 
                                          Genero, 
                                          CURP, 
                                          CalleYNumero, 
                                          Colonia,
                                          CodigoPostal,
                                          TelefonoOCelular,
                                          Correo,
                                          EscuelaProcedencia, 
                                          EntidadFederativa, 
                                          NombreEscuela, 
                                          Promedio, 
                                          OpcionEscom, 
                                          20);
      LEAVE buscar_grupo;
    END IF;
		

    IF (inscritos < 25) THEN
      INSERT INTO registroalumnos VALUES (NoBoleta, 
                                          Nombre, 
                                          ApellidoPaterno, 
                                          ApellidoMaterno, 
                                          FechaNacimiento, 
                                          Genero, 
                                          CURP, 
                                          CalleYNumero, 
                                          Colonia,
                                          CodigoPostal,
                                          TelefonoOCelular,
                                          Correo,
                                          EscuelaProcedencia, 
                                          EntidadFederativa, 
                                          NombreEscuela, 
                                          Promedio, 
                                          OpcionEscom, 
                                          grupo);
      LEAVE buscar_grupo;
    END IF;

    SET grupo = grupo + 1;

  END LOOP;
END; //

DELIMITER ;
