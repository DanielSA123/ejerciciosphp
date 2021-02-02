use agenda;
go

CREATE TABLE registro(
	idRegistro int not null identity,
	nombre nvarchar(50) not null,
	apellidos nvarchar(50) not null,
	calle nvarchar(150) not null,
	ciudad nvarchar(50) not null,
	provincia nchar(2) not null,
	cp nchar(5) not null,
	email nvarchar(100) not null,
	telefono nchar(9) not null,
	idUsuario int not null,
	constraint pkRegistro 
		primary key (idRegistro),
	constraint fkUsuarioRegistro
		foreign key (idUsuario)  references usuario(idUsuario),
	constraint fkProvinciaRegistro
		foreign key (provincia)  references provincia(codProvincia)
);