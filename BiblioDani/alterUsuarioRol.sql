alter table usuario add
rol varchar(50) ;

ALTER TABLE usuario
ADD CONSTRAINT df_Rol
DEFAULT 'usuario' FOR rol;
