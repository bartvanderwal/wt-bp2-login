/* Verwijder gehele database:
USE master
GO
ALTER DATABASE ThemaSite SET SINGLE_USER WITH ROLLBACK IMMEDIATE
GO
drop database ThemaSite

-- Of delete de tabellen:
delete bezoekers
delete posts
delete rubrieken
delete videos
*/

-- Aanmaken database
create DATABASE Themasite

use ThemaSite

CREATE TABLE bezoekers (
	[login] nvarchar(20) NOT NULL,
	[naam] nvarchar(100) NOT NULL,
	[wachtwoord] nvarchar(100) NOT NULL
) ON [PRIMARY]

GO

GO
ALTER TABLE bezoekers ADD  CONSTRAINT [PK_bezoekers] PRIMARY KEY CLUSTERED (
	login ASC
)
GO

CREATE TABLE posts (
	id [int] IDENTITY(1,1) NOT NULL,
	kopje nvarchar(100) NOT NULL,
	tekst [nvarchar(max)] NULL,
	bezoeker nvarchar(20) NOT NULL,
	rubriek nvarchar(50) NULL,
	unixtijd [int] NULL
)
GO

ALTER TABLE posts ADD CONSTRAINT [PK_posts] PRIMARY KEY CLUSTERED (
	id ASC
)
GO

ALTER TABLE posts WITH CHECK ADD CONSTRAINT [FK_posts_posts] FOREIGN KEY([id])
REFERENCES posts ([id])
GO

ALTER TABLE posts CHECK CONSTRAINT [FK_posts_posts]
GO
ALTER TABLE posts WITH CHECK ADD  CONSTRAINT FK_posts_posts1 FOREIGN KEY([id])
REFERENCES posts (id)
GO
ALTER TABLE posts CHECK CONSTRAINT [FK_posts_posts1]
GO

CREATE TABLE rubrieken (
	rubriek nvarchar(50) NOT NULL
)

GO

ALTER TABLE rubrieken ADD  CONSTRAINT PK_rubrieken PRIMARY KEY CLUSTERED  (
	rubriek ASC
)

CREATE TABLE videos(
	id [int] IDENTITY(1,1) NOT NULL,
	titel nvarchar(100) NOT NULL,
	samenvatting nvarchar(max) NULL,
	poster nvarchar(50) NULL,
	link nvarchar(100) NULL,
	rubriek nvarchar(50) NULL,
	gepubliceerd [int] NULL
)

GO

ALTER TABLE videos ADD  CONSTRAINT PK_videos PRIMARY KEY CLUSTERED (
	id ASC
)