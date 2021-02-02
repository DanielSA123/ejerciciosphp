use agenda;
go

ALTER TABLE agenda
ADD propietario int;

ALTER TABLE agenda
ADD CONSTRAINT FkUsuarioAgenda
FOREIGN KEY (propietario) REFERENCES usuario(idUsuario);

--Debes tener 2 usuarios creados para lanzar lo siguiente
UPDATE agenda
SET propietario = 2;