use biblioteca;
go

create table reservas(
idReserva int identity primary key ,
idEjemplar int	not null,
idUsuario int not null,
constraint fk_ejemplarReserva
foreign key (idEjemplar) references ejemplar(idEjemplar),
constraint fk_ejemplarUsuario
foreign key (idUsuario) references usuario(idUsuario)
)