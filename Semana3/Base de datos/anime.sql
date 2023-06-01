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