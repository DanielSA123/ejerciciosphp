USE [master]
GO
/****** Object:  Database [Biblioteca]    Script Date: 18/02/2019 17:26:44 ******/
CREATE DATABASE [Biblioteca]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'Biblioteca', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\Biblioteca.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'Biblioteca_log', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\Biblioteca_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [Biblioteca] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [Biblioteca].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [Biblioteca] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [Biblioteca] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [Biblioteca] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [Biblioteca] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [Biblioteca] SET ARITHABORT OFF 
GO
ALTER DATABASE [Biblioteca] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [Biblioteca] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [Biblioteca] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [Biblioteca] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [Biblioteca] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [Biblioteca] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [Biblioteca] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [Biblioteca] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [Biblioteca] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [Biblioteca] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [Biblioteca] SET  DISABLE_BROKER 
GO
ALTER DATABASE [Biblioteca] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [Biblioteca] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [Biblioteca] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [Biblioteca] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [Biblioteca] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [Biblioteca] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [Biblioteca] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [Biblioteca] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [Biblioteca] SET  MULTI_USER 
GO
ALTER DATABASE [Biblioteca] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [Biblioteca] SET DB_CHAINING OFF 
GO
ALTER DATABASE [Biblioteca] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [Biblioteca] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [Biblioteca]
GO
/****** Object:  Table [dbo].[Ejemplar]    Script Date: 18/02/2019 17:26:44 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Ejemplar](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idLibro] [int] NOT NULL,
	[idUsuario] [int] NULL,
 CONSTRAINT [PkEjemplar] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Genero]    Script Date: 18/02/2019 17:26:44 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Genero](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](50) NOT NULL,
	[descripcion] [nvarchar](500) NOT NULL,
 CONSTRAINT [PkGenero] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Libro]    Script Date: 18/02/2019 17:26:44 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Libro](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[titulo] [nvarchar](100) NOT NULL,
	[autor] [nvarchar](100) NOT NULL,
	[idGenero] [int] NOT NULL,
	[idioma] [nvarchar](50) NOT NULL,
	[resumen] [nvarchar](4000) NOT NULL,
 CONSTRAINT [PkLibro] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 18/02/2019 17:26:44 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tipo] [nvarchar](10) NOT NULL,
	[nombre] [nvarchar](100) NOT NULL,
	[direccion] [nvarchar](200) NOT NULL,
 CONSTRAINT [PkUsuario] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET IDENTITY_INSERT [dbo].[Ejemplar] ON 

INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (1, 1, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (2, 1, 2)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (3, 1, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (4, 2, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (5, 2, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (6, 3, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (7, 3, 7)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (8, 3, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (9, 4, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (10, 4, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (11, 5, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (12, 5, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (13, 6, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (14, 6, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (15, 7, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (16, 7, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (17, 7, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (18, 8, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (19, 8, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (20, 9, 7)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (21, 9, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (22, 9, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (23, 10, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (24, 10, 2)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (25, 11, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (26, 11, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (27, 11, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (28, 12, 4)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (29, 12, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (30, 13, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (31, 13, NULL)
INSERT [dbo].[Ejemplar] ([id], [idLibro], [idUsuario]) VALUES (32, 13, NULL)
SET IDENTITY_INSERT [dbo].[Ejemplar] OFF
SET IDENTITY_INSERT [dbo].[Genero] ON 

INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (1, N'Sátira', N'Poema utilizado para ridiculizar a alguien o a algo')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (2, N'Cuento', N'Narración breve con pocos personajes  y con el tiempo y espacio escasamente desarrollados')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (3, N'Novela', N'Narración más extensa y compleja que el cuento donde aparece una trama complicada o intensa, personajes sólidamente trazados, ambientes descritos pormenorizadamente, con lo que se crea un mundo autónomo e imaginario')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (4, N'Poema épico', N'Relata las hazañas heroicas con el propósito de glorificar a una patria. Por ejemplo, La Eneida, de Virgilio')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (5, N'Cantar de gesta', N'Poema escrito para ensalzar a un héroe. Por ejemplo, el Poema de Mío Cid')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (6, N'Romance', N'Poema épico-lírico usado para narrar hazañas o hechos de armas')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (7, N'Comedia', N'Desarrolla conflictos divertidos y amables, con personajes pertenecientes al mundo de la normalidad')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (8, N'Drama', N'Los personajes luchan contra la adversidad, que suele causarle gran daño. Pueden intervenir elementos cómicos y entonces toma el nombre de tragicomedia')
INSERT [dbo].[Genero] ([id], [nombre], [descripcion]) VALUES (9, N'Tragedia', N'Presenta terribles conflictos entre personajes de alta alcurnia –reyes, héroes- que son víctimas de terribles pasiones que les llevan a la destrucción y a la muerte')
SET IDENTITY_INSERT [dbo].[Genero] OFF
SET IDENTITY_INSERT [dbo].[Libro] ON 

INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (1, N'Rinconete y Cortadillo', N'Miguel de Cervantes Saavedra', 3, N'Castellano', N'Dos jóvenes, Pedro del Rincón y Diego Cortado, abandonadas las casas de sus padres, se conocen y se hacen amigos en una venta en el camino de Toledo a 
Córdoba. Sin planes, deciden acompañar a unos pasajeros a Sevilla. Allí encuentran el mundo del hampa, e intentan formar parte de él. Pero forzosamente tienen que presentarse ante Monipodio, jefe de un gremio de ladrones. Viven en su gran casa, cambian de nombres y forman parte de esta pintoresca cofradía de criminales')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (2, N'Much Ado About Nothing', N'William Shakespeare', 7, N'English', N'By means of "noting" (which, in Shakespeare''s day, sounded similar to "nothing" as in the play''s title, and which means gossip, rumour, and overhearing), Benedick and Beatrice are tricked into confessing their love for each other, and Claudio is tricked into rejecting Hero at the altar on the erroneous belief that she has been unfaithful. At the end, Benedick and Beatrice join forces to set things right, and the others join in a dance celebrating the marriages of the two couples')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (3, N'La vida es sueño', N'Pedro Calderón de la Barca', 8, N'Castellano', N'El tema central es la libertad del ser humano para configurar su vida, sin dejarse llevar por un supuesto destino')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (4, N'La tragedia de Hamlet, Príncipe de Dinamarca', N'William Shakespeare', 9, N'Castellano', N'La obra transcurre en Dinamarca, y trata de los acontecimientos posteriores al asesinato del rey Hamlet (padre del príncipe Hamlet), a manos de su hermano Claudio. El fantasma del rey pide a su hijo que se vengue de su asesino. La obra discurre vívidamente alrededor de la locura (tanto real como fingida), y de la transformación del profundo dolor en desmesurada ira. Además de explorar temas como la traición, la venganza, el incesto y la corrupción moral.')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (5, N'Fausto', N'Johann Wolfgang von Goethe', 9, N'Castellano', N'Fausto es el protagonista de una leyenda clásica alemana, un erudito de gran éxito, pero también insatisfecho con su vida, por lo que hace un trato con el diablo, intercambiando su alma por el conocimiento ilimitado y los placeres mundanos')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (6, N'L''Avare', N'Molière (Jean-Baptiste Poquelin)', 7, N'Français', N'Il s''agit d''une comédie de caractère dont le personnage principal, Harpagon, est caractérisé par son avarice caricaturale. Harpagon tente de marier sa fille de force, tout en protégeant obstinément une cassette pleine d''or qu''il a découverte depuis peu')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (7, N'Decamerón', N'Giovanni Boccaccio', 2, N'Castellano', N'Desarrolla tres temas principales: el amor, la inteligencia humana y la fortuna. Los diversos cuentos de amor en el Decamerón van de lo erótico a lo trágico. Son relatos de ingenio, bromas y lecciones vitales')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (8, N'Veinte mil leguas de viaje submarino', N'Julio Verne', 3, N'Castellano', N'El profesor Pierre Aronnax, notable biólogo, es hecho prisionero por el Capitán Nemo y es conducido por los océanos a bordo del submarino Nautilus, en compañía de su criado Conseil y el arponero canadiense Ned Land')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (9, N'Guerra y paz', N'León Tolstói', 3, N'Castellano', N'Narra las vicisitudes de numerosos personajes de todo tipo y condición a lo largo de unos cincuenta años de historia rusa, desde las guerras napoleónicas hasta más allá de mediados del siglo XIX')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (10, N'Tres tristes tigres', N'Guillermo Cabrera Infante', 3, N'Castellano', N'Es, en palabras de su autor, una galería de voces, casi un museo del habla cubana, en la que generaciones por venir podrían oír hablar a sus ancestros . Una recreación nostálgica de La Habana de 1958, y en especial de su vida nocturna. Un canto a la ciudad, que recrea y mitifica, rescribiendo la historia de la cultura habanera')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (11, N'Pantaleón y las visitadoras', N'Mario Vargas Llosa', 3, N'Castellano', N'La historia se desarrolla en la Amazonía Peruana, donde los efectivos del Ejército del Perú son atendidos por un servicio de prostitutas, a quienes llaman "visitadoras". Según el propio autor, la obra se basa en hechos reales, según él mismo pudo constatarlo en 1958 y 1964, cuando viajó a la selva del Perú.')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (12, N'Ficciones', N'Jorge Luis Borges', 2, N'Castellano', N'Compuesto de dos partes: El jardín de senderos que se bifurcan y Artificios. su publicación en 1944 colocó a Borges en un primer plano de la literatura universal. Fue incluida en la lista de las 100 mejores novelas en español del siglo XX del periódico español «El Mundo», así como también en la lista de los 100 libros del siglo XX del diario francés Le Monde y en los 100 mejores libros de todos los tiempos del Club de libros de Noruega.')
INSERT [dbo].[Libro] ([id], [titulo], [autor], [idGenero], [idioma], [resumen]) VALUES (13, N'Bestiario', N'Julio Cortazar', 2, N'Castellano', N' Es el primer libro de relatos que Julio Cortázar publicó con su auténtico nombre. Estas ocho obras maestras: son perfectas. Estos cuentos, que hablan de objetos y hechos cotidianos, pasan a la dimensión de la pesadilla o de la revelación de un modo natural e imperceptible.')
SET IDENTITY_INSERT [dbo].[Libro] OFF
SET IDENTITY_INSERT [dbo].[Usuario] ON 

INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (1, N'operador', N'David Gil Sanz', N'Rua Grande 10')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (2, N'usuario', N'María Pérez Gil', N'C/ Mayor 24')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (3, N'usuario', N'Luis Sanz Po', N'Avda. Francia 89')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (4, N'usuario', N'Andrés Martín Ruíz', N'C/ Perea 54')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (5, N'usuario', N'Luisa Ros Sáenz', N'C/ Camino 36')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (6, N'usuario', N'Juan Ortiz Soto', N'Avda. Grande 10')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (7, N'usuario', N'Andrea García Rios', N'C/ Magnolia 8')
INSERT [dbo].[Usuario] ([id], [tipo], [nombre], [direccion]) VALUES (8, N'usuario', N'Carlos Cruz Vega', N'Ctra. Las Vegas 78')
SET IDENTITY_INSERT [dbo].[Usuario] OFF
ALTER TABLE [dbo].[Ejemplar]  WITH CHECK ADD  CONSTRAINT [FkLibroNEjemplar] FOREIGN KEY([idLibro])
REFERENCES [dbo].[Libro] ([id])
GO
ALTER TABLE [dbo].[Ejemplar] CHECK CONSTRAINT [FkLibroNEjemplar]
GO
ALTER TABLE [dbo].[Ejemplar]  WITH CHECK ADD  CONSTRAINT [FkUsuarioNEjemplar] FOREIGN KEY([idUsuario])
REFERENCES [dbo].[Usuario] ([id])
GO
ALTER TABLE [dbo].[Ejemplar] CHECK CONSTRAINT [FkUsuarioNEjemplar]
GO
ALTER TABLE [dbo].[Libro]  WITH CHECK ADD  CONSTRAINT [FkGeneroNLibro] FOREIGN KEY([idGenero])
REFERENCES [dbo].[Genero] ([id])
GO
ALTER TABLE [dbo].[Libro] CHECK CONSTRAINT [FkGeneroNLibro]
GO
USE [master]
GO
ALTER DATABASE [Biblioteca] SET  READ_WRITE 
GO
