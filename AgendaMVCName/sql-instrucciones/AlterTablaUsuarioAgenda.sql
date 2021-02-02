use agenda;
go

ALTER TABLE usuario
add rol nvarchar(15) not null default N'usuarios';

ALTER TABLE usuario
add constraint UsuarioUNIQUEusuario unique (usuario);

update  usuario set rol = 'Administradores' where idUsuario=1;


SELECT * FROM USUARIO