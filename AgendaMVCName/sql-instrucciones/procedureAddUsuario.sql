use agenda;
go

create or alter procedure [dbo].[addUsuario]
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
	)
 as 
begin
	begin tran;
		declare @idUsuario int;
		declare @error nvarchar(255);
		declare @severidad smallint;
		declare @estado smallint;
		begin try 
			insert into usuario(usuario,pass) values(@usuario,@pass);
			select @idUsuario = SCOPE_IDENTITY();
			insert into registro
				select @nombre,@apellidos,@calle,@ciudad,p.codProvincia,@cp,@email,@telefono,@idUsuario
				from provincia p
 				where p.nombre = @provincia
			commit tran;
		end try
		begin catch
			rollback tran;
			select @error = ERROR_MESSAGE();
			select @severidad = ERROR_SEVERITY();
			select @estado = ERROR_STATE();
			raiserror (@error,@severidad,@estado);
		end catch

end;
go