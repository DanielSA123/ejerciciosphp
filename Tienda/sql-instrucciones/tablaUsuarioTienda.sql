use proyecto;
go

Create table usuario(
usu nvarchar(10) not null,
pass nvarchar(255) not null,
Constraint pkUsuario
Primary Key (usu),
);

insert into usuario
values(N'admin',N'$2y$10$crHiQywoSO8ATVgy4a43mOV1kjSKk0h5WmuQBF/VbPLJfIy9XYMua'),
	(N'gestor',N'$2y$10$TbR6yQGB7Jyw99ieenTx3.8LIhoRHsDAZcNJTO1HSle3m6K4SZGeu');