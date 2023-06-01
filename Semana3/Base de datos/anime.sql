CREATE DATABASE anime CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE TABLE anime(
    ID_ANIME INT PRIMARY KEY AUTO_INCREMENT,
    nombre CHAR(200),
    nombre_prota CHAR(200) 
);
INSERT INTO anime(nombre,nombre_prota) VALUES("Hellsing","Alucard");
SELECT * FROM anime WHERE nombre_prota="Alucard" AND ID_ANIME=1;
INSERT INTO anime(nombre,nombre_prota) VALUES("Berserk","Guts");
SELECT * FROM anime;
SELECT nombre,nombre_prota FROM anime;
ALTER TABLE anime ADD nombre_antagonista CHAR(200);
UPDATE anime SET nombre_antagonista="Max Montana" WHERE ID_ANIME=1;
UPDATE anime SET nombre_antagonista="Griffith" WHERE ID_ANIME=2;
UPDATE anime SET nombre_antagonista="General" WHERE nombre_antagonista="Griffith";
DELETE FROM anime WHERE nombre_antagonista="General";
TRUNCATE anime; --borra toh los registros
DROP DATABASE anime; --borra la base de datos completa
ALTER TABLE table_name DROP COLUMN column_name
CREATE TABLE usuario(
    ID_USUARIO INT PRIMARY KEY AUTO_INCREMENT,
    nombre CHAR(200),
    tel CHAR(10)
);
CREATE TABLE usuario_HASH_usuario(
    ID_rel INT PRIMARY KEY AUTO_INCREMENT,
    ID_USUARIO1 INT NOT NULL,
    FOREIGN KEY (ID_USUARIO1) REFERENCES usuario (ID_USUARIO),
    ID_USUARIO2 INT NOT NULL,
    FOREIGN KEY (ID_USUARIO2) REFERENCES usuario (ID_USUARIO)
);
FOREIGN KEY(ID_rel) REFERENCES usuario_HASH_usuario (ID_rel);

CREATE TABLE personaje(
    id_personaje INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200),
    edad TINYINT,
    fuerza SMALLINT,
    enemigo_principal CHAR(50),
    aparece_en CHAR(30)
);
INSERT INTO personaje VALUES('Guts',30,10000,'Griffith','Berserk');

CREATE table items(
    id_item INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    tipo CHAR(50)
);
ALTER TABLE personaje ADD (
    id_item INT NOT NULL,
    FOREIGN KEY (id_item) REFERENCES items (id_item)
);