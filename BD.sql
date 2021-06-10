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
  PRIMARY KEY (idGrupo)
);

INSERT INTO grupo (Nombre, horario) VALUES('1CM1', '2021-08-23 09:00:00');
INSERT INTO grupo (Nombre, horario) VALUES('1CM2', '2021-08-23 10:45:00');
INSERT INTO grupo (Nombre, horario) VALUES('1CM3', '2021-08-23 12:30:00');
INSERT INTO grupo (Nombre, horario) VALUES('1CM4', '2021-08-24 09:00:00');
INSERT INTO grupo (Nombre, horario) VALUES('1CM5', '2021-08-24 10:45:00');
INSERT INTO grupo (Nombre, horario) VALUES('1CM6', '2021-08-24 12:30:00');

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
  
  buscar_grupo : LOOP
    SELECT COUNT(*) into inscritos FROM registroalumnos WHERE idGrupo = grupo;

    IF(grupo = 6) THEN
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


CALL inscribir('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('5', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('6', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('7', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
CALL inscribir('8', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

//Para buscar el horario del grupo
select horario from grupo where idGrupo = 1;