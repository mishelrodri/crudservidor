/*
 Navicat Premium Data Transfer

 Source Server         : SQLEXPRESS
 Source Server Type    : SQL Server
 Source Server Version : 15002080
 Source Host           : localhost\SQLEXPRESS:1433
 Source Catalog        : db_ferreteria
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 15002080
 File Encoding         : 65001

 Date: 30/05/2022 13:54:30
*/


-- ----------------------------
-- Table structure for cargo
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[cargo]') AND type IN ('U'))
	DROP TABLE [dbo].[cargo]
GO

CREATE TABLE [dbo].[cargo] (
  [idcargo] bigint  NOT NULL,
  [nombre] nvarchar(100) COLLATE Latin1_General_CI_AI  NOT NULL
)
GO

ALTER TABLE [dbo].[cargo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of cargo
-- ----------------------------
INSERT INTO [dbo].[cargo] ([idcargo], [nombre]) VALUES (N'1', N'dqd')
GO

INSERT INTO [dbo].[cargo] ([idcargo], [nombre]) VALUES (N'2', N'SDF')
GO


-- ----------------------------
-- Table structure for empleado
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[empleado]') AND type IN ('U'))
	DROP TABLE [dbo].[empleado]
GO

CREATE TABLE [dbo].[empleado] (
  [idempleado] bigint  NOT NULL,
  [dui] nvarchar(10) COLLATE Latin1_General_CI_AI  NOT NULL,
  [nombre] nvarchar(100) COLLATE Latin1_General_CI_AI  NOT NULL,
  [apellido] nvarchar(50) COLLATE Latin1_General_CI_AI  NOT NULL,
  [direccion] nvarchar(max) COLLATE Latin1_General_CI_AI  NOT NULL,
  [estado] int  NOT NULL,
  [idcargo] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[empleado] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO [dbo].[empleado] ([idempleado], [dui], [nombre], [apellido], [direccion], [estado], [idcargo]) VALUES (N'1', N'54464444-4', N'fhnfshn', N'sfhn', N'fn', N'1', N'1')
GO

INSERT INTO [dbo].[empleado] ([idempleado], [dui], [nombre], [apellido], [direccion], [estado], [idcargo]) VALUES (N'2', N'23', N'Admin', N'', N'AEF', N'1', N'1')
GO

INSERT INTO [dbo].[empleado] ([idempleado], [dui], [nombre], [apellido], [direccion], [estado], [idcargo]) VALUES (N'3', N'464646', N'rgh', N'gh', N'ggd', N'2', N'2')
GO

INSERT INTO [dbo].[empleado] ([idempleado], [dui], [nombre], [apellido], [direccion], [estado], [idcargo]) VALUES (N'4', N'55555555-5', N'ggtt', N'ggtt', N'ggtt', N'2', N'1')
GO

INSERT INTO [dbo].[empleado] ([idempleado], [dui], [nombre], [apellido], [direccion], [estado], [idcargo]) VALUES (N'5', N'66666666-6', N'rghrgh', N'gfhl', N'sdfghl', N'0', N'2')
GO


-- ----------------------------
-- Primary Key structure for table cargo
-- ----------------------------
ALTER TABLE [dbo].[cargo] ADD CONSTRAINT [PK__cargo__0515A5AD22B488D3] PRIMARY KEY CLUSTERED ([idcargo])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table empleado
-- ----------------------------
CREATE NONCLUSTERED INDEX [fk_cargo]
ON [dbo].[empleado] (
  [idcargo] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table empleado
-- ----------------------------
ALTER TABLE [dbo].[empleado] ADD CONSTRAINT [PK__empleado__EE7D5EF6A5F837C8] PRIMARY KEY CLUSTERED ([idempleado])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Foreign Keys structure for table empleado
-- ----------------------------
ALTER TABLE [dbo].[empleado] ADD CONSTRAINT [fk_cargo] FOREIGN KEY ([idcargo]) REFERENCES [dbo].[cargo] ([idcargo]) ON DELETE NO ACTION ON UPDATE NO ACTION
GO

