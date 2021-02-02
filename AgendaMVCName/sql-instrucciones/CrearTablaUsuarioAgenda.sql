use agenda;
go

CREATE TABLE usuario(
idUsuario int identity not null,
usuario nvarchar(20) not null,
pass nvarchar(255) not null,
CONSTRAINT PkUsuario
	PRIMARY KEY (idUsuario),
);

insert into usuario(usuario,pass)
values('admin','Abc123??');

select * from usuario;

UPDATE usuario
set pass = N'$2y$10$OvWgTQNqibELkJASLxDkzeKTv8dnHnNTiRHB.KfhZlzGd.FtTDgRe';