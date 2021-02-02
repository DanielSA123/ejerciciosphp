use agenda;
go

create or alter procedure addUsusario
(
	@nombre nvarchar(50),
	@apellidos nvarchar(100),
	@calle nvarchar(150),
	@ciudad nvarchar(50),
	@provincia nvarchar(20),
	@cp nchar(5),
	@email nvarchar(100),
	@telefono nchar(9),
	@usuario nvarchar(20),
	@pass nvarchar(255)
) as 
begin
	begin transaction
		declare @idUsuario int;
		declare @ERROR nvarchar(255);
		begin try 
		insert into usuario(usuario,pass) values(@usuario,@pass);
		select @idUsuario = SCOPE_IDENTITY();
		insert into registro(nombre,apelidos,calle,ciudad,provincia,cp,email,telefono,idUsuario)
			select @nombre,@apellidos,@calle,@ciudad,p.codProvincia,@cp,@email,@telefono,@idUsuario
			from provincia p
 			where p.nombre = @provincia
		commit tran;
		end try
		begin catch
			rollback tran;
			select @ERROR = ERROR_MESSAGE();
			throw @ERROR,
			

		end catch

end;