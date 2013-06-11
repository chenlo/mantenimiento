/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-06-08 08:06:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for AuthAssignment
-- ----------------------------
DROP TABLE IF EXISTS `AuthAssignment`;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of AuthAssignment
-- ----------------------------
INSERT INTO `AuthAssignment` VALUES ('admin', '1', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('personal', '3', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('personal', '9', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('responsable', '2', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('usuario', '4', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('usuario', '5', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('usuario', '6', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('usuario', '7', null, 'N;');
INSERT INTO `AuthAssignment` VALUES ('usuario', '8', null, 'N;');

-- ----------------------------
-- Table structure for AuthItem
-- ----------------------------
DROP TABLE IF EXISTS `AuthItem`;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of AuthItem
-- ----------------------------
INSERT INTO `AuthItem` VALUES ('admin', '2', 'Administrador de la aplicación', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Administrar incidencias', '1', 'Administrar todas las incidencias del sistema', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Consultar mis incidencia', '1', 'Listar y ver tus incidencias', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Crear incidencia', '1', 'Crear una incidencia', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Editar incidencia', '1', 'Editar el estado y las tareas de una incidencia', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Editar perfil', '1', 'Editar mi perfil', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Gestión de usuarios', '1', 'Gestión de usuarios', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Admin', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Create', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Delete', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Index', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Misincidencias', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.Update', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Incidencia.View', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('invitado', '2', 'Usuario que no ha iniciado sesión', null, 'N;');
INSERT INTO `AuthItem` VALUES ('personal', '2', 'Personal de la unidad', null, 'N;');
INSERT INTO `AuthItem` VALUES ('responsable', '2', 'Responsable de la unidad', null, 'N;');
INSERT INTO `AuthItem` VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.Admin', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.Create', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.Delete', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.Index', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.Update', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('Tarea.View', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Activation.Activation', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Admin.Admin', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Admin.Create', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Admin.Delete', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Admin.Update', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Admin.View', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Default.Index', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Login.Login', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Logout.Logout', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Profile.Changepassword', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Profile.Edit', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Profile.Profile', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.ProfileField.Admin', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.ProfileField.Create', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.ProfileField.Delete', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.ProfileField.Update', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.ProfileField.View', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Recovery.Recovery', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.Registration.Registration', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.User.Index', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('User.User.View', '0', null, null, 'N;');
INSERT INTO `AuthItem` VALUES ('usuario', '2', 'Usuario del servicio', null, 'N;');

-- ----------------------------
-- Table structure for AuthItemChild
-- ----------------------------
DROP TABLE IF EXISTS `AuthItemChild`;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of AuthItemChild
-- ----------------------------
INSERT INTO `AuthItemChild` VALUES ('responsable', 'Administrar incidencias');
INSERT INTO `AuthItemChild` VALUES ('usuario', 'Consultar mis incidencia');
INSERT INTO `AuthItemChild` VALUES ('usuario', 'Crear incidencia');
INSERT INTO `AuthItemChild` VALUES ('personal', 'Editar incidencia');
INSERT INTO `AuthItemChild` VALUES ('usuario', 'Editar perfil');
INSERT INTO `AuthItemChild` VALUES ('Administrar incidencias', 'Incidencia.Admin');
INSERT INTO `AuthItemChild` VALUES ('Crear incidencia', 'Incidencia.Create');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Incidencia.Index');
INSERT INTO `AuthItemChild` VALUES ('Consultar mis incidencia', 'Incidencia.Misincidencias');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Incidencia.Update');
INSERT INTO `AuthItemChild` VALUES ('Consultar mis incidencia', 'Incidencia.View');
INSERT INTO `AuthItemChild` VALUES ('responsable', 'personal');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Tarea.Create');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Tarea.Delete');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Tarea.Index');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Tarea.Update');
INSERT INTO `AuthItemChild` VALUES ('Editar incidencia', 'Tarea.View');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Activation.Activation');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Admin.Admin');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Admin.Create');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Admin.Delete');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Admin.Update');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Admin.View');
INSERT INTO `AuthItemChild` VALUES ('Gestión de usuarios', 'User.Default.Index');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.Profile.Changepassword');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.Profile.Edit');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.ProfileField.Create');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.ProfileField.Update');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.ProfileField.View');
INSERT INTO `AuthItemChild` VALUES ('Editar perfil', 'User.User.View');
INSERT INTO `AuthItemChild` VALUES ('personal', 'usuario');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `departamento` varchar(255) NOT NULL DEFAULT '',
  `edificio` varchar(30) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `despacho` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', 'Admin', 'Administrator', '', '', '', '0');
INSERT INTO `profiles` VALUES ('2', 'Maroto', 'Javier', 'Mantenimiento', 'M3', '5163', '730');
INSERT INTO `profiles` VALUES ('3', 'Gómez', 'Eduardo', 'Mantenimiento', 'M3', '5163', '730');
INSERT INTO `profiles` VALUES ('4', 'Pez Pez', 'Alfredo', 'ESI', 'M1', '7867', '321');
INSERT INTO `profiles` VALUES ('5', 'Parra', 'JL', 'ESI', 'M1', '8989', '123');
INSERT INTO `profiles` VALUES ('6', 'Perez', 'Luisje', 'Ing. Materiales', 'M2', '7878', '123');
INSERT INTO `profiles` VALUES ('7', 'Sanz', 'Marisa', 'ERE', 'M2', '7877', '123');
INSERT INTO `profiles` VALUES ('8', 'Sánchez', 'Rogelio', 'Departamento de Rocas', 'M3', '4325', '8733');
INSERT INTO `profiles` VALUES ('9', 'Clon', 'Javier', 'Mantenimiento', 'M3', '5163', '730');

-- ----------------------------
-- Table structure for profiles_fields
-- ----------------------------
DROP TABLE IF EXISTS `profiles_fields`;
CREATE TABLE `profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles_fields
-- ----------------------------
INSERT INTO `profiles_fields` VALUES ('1', 'firstname', 'Nombre', 'VARCHAR', '50', '', '1', '', '', '', '', '', '', '', '1', '3');
INSERT INTO `profiles_fields` VALUES ('2', 'lastname', 'Apellidos', 'VARCHAR', '50', '3', '1', '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', '2', '3');
INSERT INTO `profiles_fields` VALUES ('3', 'departamento', 'Departamento', 'VARCHAR', '255', '0', '1', '', '', '', '', '', '', '', '3', '3');
INSERT INTO `profiles_fields` VALUES ('4', 'telefono', 'Teléfono', 'VARCHAR', '20', '0', '1', '', '', '', '', '', '', '', '4', '3');
INSERT INTO `profiles_fields` VALUES ('5', 'edificio', 'Edificio', 'VARCHAR', '30', '0', '1', '', '', '', '', '', '', '', '5', '3');
INSERT INTO `profiles_fields` VALUES ('6', 'despacho', 'Despacho', 'INTEGER', '10', '0', '1', '', '', '', '', '0', '', '', '6', '3');

-- ----------------------------
-- Table structure for Rights
-- ----------------------------
DROP TABLE IF EXISTS `Rights`;
CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Rights
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_comentario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE `tbl_comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL,
  `incidencia_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_incidencia` (`incidencia_id`),
  KEY `fk_comentario_propietario` (`create_user_id`),
  KEY `fk_comentario_actualizado_usuario` (`update_user_id`),
  CONSTRAINT `fk_comentario_actualizado_usuario` FOREIGN KEY (`update_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_comentario_incidencia` FOREIGN KEY (`incidencia_id`) REFERENCES `tbl_incidencia` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_comentario_propietario` FOREIGN KEY (`create_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_comentario
-- ----------------------------
INSERT INTO `tbl_comentario` VALUES ('1', 'Estamos investigando en Google cómo resolverlo', '1', '2013-06-02 00:35:45', '1', '2013-06-02 00:35:45', '1');
INSERT INTO `tbl_comentario` VALUES ('2', 'Estamos trabajando en ello', '1', '2013-06-04 00:35:39', '1', '2013-06-04 00:35:39', '1');
INSERT INTO `tbl_comentario` VALUES ('3', 'Estamos muy liados.', '1', '2013-06-02 08:10:09', '1', '2013-06-02 08:10:09', '1');
INSERT INTO `tbl_comentario` VALUES ('4', 'No ha venido nadie a trabajar todavía', '1', '2013-06-02 08:11:29', '1', '2013-06-02 08:11:29', '1');
INSERT INTO `tbl_comentario` VALUES ('5', 'Todavía no ha llegado nadie', '1', '2013-06-02 08:12:28', '1', '2013-06-02 08:12:28', '1');
INSERT INTO `tbl_comentario` VALUES ('6', 'Parece que ya va mejor la cosa', '5', '2013-06-06 00:06:15', '5', '2013-06-06 00:06:15', '5');
INSERT INTO `tbl_comentario` VALUES ('7', 'Os escribí hace unos minutos y todavía no habéis venido.', '9', '2013-06-08 00:31:53', '6', '2013-06-08 00:31:53', '6');
INSERT INTO `tbl_comentario` VALUES ('8', 'Sois muy lentos.', '1', '2013-06-08 00:53:40', '6', '2013-06-08 00:53:40', '6');

-- ----------------------------
-- Table structure for tbl_incidencia
-- ----------------------------
DROP TABLE IF EXISTS `tbl_incidencia`;
CREATE TABLE `tbl_incidencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_usuario_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `prioridad_id` int(11) NOT NULL,
  `asignado_usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_incencia_usuario` (`asignado_usuario_id`),
  CONSTRAINT `fk_incencia_usuario` FOREIGN KEY (`asignado_usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_incidencia
-- ----------------------------
INSERT INTO `tbl_incidencia` VALUES ('1', 'No funciona internet', 'No funciona internet en el ordenador de la garita', '2013-05-29 02:26:51', '6', '2013-06-07 21:38:08', '1', '3', '1', '2');
INSERT INTO `tbl_incidencia` VALUES ('2', 'Arreglar el marco de la puerta', 'El marco de la puerta se despegó en la esquina superior derecha.', '2013-05-29 02:26:51', '6', '2013-06-08 00:59:39', '1', '1', '0', '3');
INSERT INTO `tbl_incidencia` VALUES ('3', 'No hay luz en la entrada del M3', 'Parece que ha saltado el automático del cuadro de luces correspondiente a la entrada.', '2013-05-29 02:31:06', '7', '2013-06-08 01:22:17', '1', '2', '2', '3');
INSERT INTO `tbl_incidencia` VALUES ('4', 'Han sellado la puerta de acceso de la fotocopiadora', 'Han sellado la puerta de acceso de la fotocopiadora. Parece que han sido unos estudiantes enfadados con el servicio recibido.', '2013-05-29 02:44:59', '7', '2013-06-08 01:10:46', '1', '1', '1', '3');
INSERT INTO `tbl_incidencia` VALUES ('5', 'No me va el ordenador', 'Algo falla en mí', '2013-06-01 22:11:29', '5', '2013-06-01 22:11:29', '5', '3', '0', '3');
INSERT INTO `tbl_incidencia` VALUES ('6', 'La persiana no sube', 'Me es imposible subir la persiana del despacho. He probado todos los métodos analógicos posibles.\r\n\r\nNecesito que entre el sol en mi vida.', '2013-06-08 00:08:16', '8', '2013-06-08 01:15:12', '1', '0', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('7', 'La máquina de café no funciona', 'La máquina de café no funciona desde el martes. He intentado cambiar el filtro, pero el café sigue sabiendo a rayos.', '2013-06-08 00:13:30', '8', '2013-06-08 01:15:26', '1', '0', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('8', 'Parece que hay humedades en el techo de mi despacho', 'Alguien se ha dejado el grifo abierto el fin de semana. Cuando llegué el lunes a primera hora encontré un gran charcho sobre mi alfombra persa. El techo se cae a trocitos.', '2013-06-08 00:16:22', '5', '2013-06-08 00:16:22', '5', '0', '0', '2');
INSERT INTO `tbl_incidencia` VALUES ('9', 'Fallo en el termostato', 'La temperatura en mi despacho es de aproximadamente 42 grados Celsius. \r\n\r\nHe preguntado a mis vecinos de pasillo y ellos están a buena temperatura.\r\n\r\nGracias.', '2013-06-08 00:18:21', '6', '2013-06-08 01:15:47', '1', '0', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('10', 'Colocar mesa puesto 1 del despacho', 'Colocar mesa puesto 1 del despacho', '2013-06-08 04:34:28', '2', '2013-06-08 04:35:59', '2', '3', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('11', 'Colocar mesa puesto 2 del despacho', 'Colocar mesa puesto 2 del despacho', '2013-06-08 04:34:43', '2', '2013-06-08 04:34:43', '2', '3', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('12', 'Colocar mesa puesto 3 del despacho', 'Colocar mesa puesto 3 del despacho', '2013-06-08 04:34:54', '2', '2013-06-08 04:34:54', '2', '3', '0', '9');
INSERT INTO `tbl_incidencia` VALUES ('13', 'Colocar mesa puesto 4 del despacho', 'Colocar mesa puesto 4 del despacho', '2013-06-08 04:35:07', '2', '2013-06-08 04:35:07', '2', '3', '0', '3');
INSERT INTO `tbl_incidencia` VALUES ('14', 'Colocar mesa puesto 5 del despacho', 'Colocar mesa puesto 5 del despacho', '2013-06-08 04:35:20', '2', '2013-06-08 04:35:20', '2', '3', '0', '3');
INSERT INTO `tbl_incidencia` VALUES ('15', 'Instalar teléfono puesto 1 del despacho', 'Instalar puesto 1 del despacho', '2013-06-08 04:34:28', '2', '2013-06-08 04:35:59', '2', '3', '1', '9');
INSERT INTO `tbl_incidencia` VALUES ('16', 'Instalar teléfono puesto 2 del despacho', 'Instalar puesto 2 del despacho', '2013-06-08 04:34:43', '2', '2013-06-08 04:34:43', '2', '3', '1', '9');
INSERT INTO `tbl_incidencia` VALUES ('17', 'Instalar teléfono puesto 3 del despacho', 'Instalar puesto 3 del despacho', '2013-06-08 04:34:54', '2', '2013-06-08 04:34:54', '2', '3', '1', '9');
INSERT INTO `tbl_incidencia` VALUES ('18', 'Instalar teléfono puesto 4 del despacho', 'Instalar puesto 4 del despacho', '2013-06-08 04:35:07', '2', '2013-06-08 04:35:07', '2', '3', '1', '3');
INSERT INTO `tbl_incidencia` VALUES ('19', 'Instalar teléfono puesto 5 del despacho', 'Instalar mesa puesto 5 del despacho', '2013-06-08 04:35:20', '2', '2013-06-08 04:35:20', '2', '3', '1', '3');
INSERT INTO `tbl_incidencia` VALUES ('20', 'Colocar cartel identificador del puesto 1 del despacho', 'Instalar cartel 1 del despacho', '2013-06-08 04:34:28', '2', '2013-06-08 04:35:59', '2', '3', '2', '2');
INSERT INTO `tbl_incidencia` VALUES ('21', 'Colocar cartel identificador del puesto 2 del despacho', 'Instalar cartel 2 del despacho', '2013-06-08 04:34:43', '2', '2013-06-08 04:34:43', '2', '3', '2', '9');
INSERT INTO `tbl_incidencia` VALUES ('22', 'Colocar cartel identificador del puesto 3 del despacho', 'Instalar cartel 3 del despacho', '2013-06-08 04:34:54', '2', '2013-06-08 04:34:54', '2', '3', '2', '9');
INSERT INTO `tbl_incidencia` VALUES ('23', 'Colocar cartel identificador del puesto 4 del despacho', 'Instalar cartel 4 del despacho', '2013-06-08 04:35:07', '2', '2013-06-08 04:35:07', '2', '3', '2', '3');
INSERT INTO `tbl_incidencia` VALUES ('24', 'Colocar cartel identificador del puesto 5 del despacho', 'Instalar cartel 5 del despacho', '2013-06-08 04:35:20', '2', '2013-06-08 04:35:20', '2', '2', '1', '3');

-- ----------------------------
-- Table structure for tbl_migration
-- ----------------------------
DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_migration
-- ----------------------------
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base', '1369713977');
INSERT INTO `tbl_migration` VALUES ('m111222_183233_create_user_tables', '1369713982');
INSERT INTO `tbl_migration` VALUES ('m111222_203126_create_rbac_tables', '1369713983');
INSERT INTO `tbl_migration` VALUES ('m130525_162030_create_incidencia_table', '1369715132');
INSERT INTO `tbl_migration` VALUES ('m130525_162713_create_tarea_asignacion_table', '1369715134');
INSERT INTO `tbl_migration` VALUES ('m130602_044003_create_comentario_table', '1370148324');

-- ----------------------------
-- Table structure for tbl_tarea
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tarea`;
CREATE TABLE `tbl_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `incidencia_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `tiempo_realizacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarea_incidencia` (`incidencia_id`),
  CONSTRAINT `fk_tarea_incidencia` FOREIGN KEY (`incidencia_id`) REFERENCES `tbl_incidencia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tarea
-- ----------------------------
INSERT INTO `tbl_tarea` VALUES ('1', 'Revisión del switch', 'Hacer como revisión del switch ', '1', '0', '2', '2013-05-31 00:56:00', '2', '2013-05-31 00:56:00', '2', '120');
INSERT INTO `tbl_tarea` VALUES ('2', 'Comprobar conectividad', 'Comprobar que llegan los datos por el cable', '1', '1', '1', '2013-06-02 05:30:49', '2', '2013-06-02 05:38:50', '2', '130');
INSERT INTO `tbl_tarea` VALUES ('3', 'Limpiar ', 'Limpiarlo todo', '2', '0', '2', '2013-06-02 06:07:17', '2', '2013-06-02 06:07:17', '2', '5');
INSERT INTO `tbl_tarea` VALUES ('4', 'Arrancar cabezas', 'Arrancar cabezas a los usuarios', '2', '0', '2', '2013-06-02 06:10:23', '3', '2013-06-02 06:10:23', '3', '10');
INSERT INTO `tbl_tarea` VALUES ('5', 'Comprobar el cuadro de mandos del M1', 'Las llaves hay que pedirlas en conserjería. En el cuadro hay una pegatina identificativa.', '3', '0', '2', '2013-06-08 01:22:03', '1', '2013-06-08 01:22:03', '1', '30');
INSERT INTO `tbl_tarea` VALUES ('6', 'Comprobar el tirador', 'Comprobar el correcto funcionamiento del tirador', '6', '1', '2', '2013-06-08 03:13:25', '1', '2013-06-08 03:13:25', '1', '380');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_username` (`username`),
  UNIQUE KEY `uc_email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'webmaster@example.com', '21232f297a57a5a743894a0e4a801fc3', '9a24eff8c15a6a141ece27eb6947da0f', '2013-05-28 06:06:21', '2013-06-08 04:36:57', '1', '1');
INSERT INTO `users` VALUES ('2', 'maroto', 'jmaroto@upm.es', '2aa52d9919d032077c19353c8999a9d8', '7c15cdf7da5f365daacadc8b2531bcb7', '2013-05-28 06:06:21', '2013-06-08 04:34:04', '0', '1');
INSERT INTO `users` VALUES ('3', 'edu', 'edu@upm.es', '1fb062ee3755a6e79929022261dcf04b', 'a16984971c4e95b812ac501ba160cdee', '2013-05-29 01:14:05', '2013-06-08 02:38:04', '0', '1');
INSERT INTO `users` VALUES ('4', 'alfredo', 'alfredo@upm.es', '63aba506f730af73e1c6c7c977f426b2', '648da984caf23004cc98c5b0c3e55d74', '2013-05-29 01:16:13', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `users` VALUES ('5', 'parra', 'parra@upm.es', '4d49ed67e56292ce1e2a7a1fceb0df0c', '21510845bd93c9debd80fe7f5cb48fcd', '2013-05-29 01:18:51', '2013-06-08 02:36:13', '0', '1');
INSERT INTO `users` VALUES ('6', 'luisje', 'luisje@upm.es', '1891d87b707306b2fc6da5d353e91c7f', '42fbc7e4c6f27acdf5140edf3c2d4558', '2013-05-29 01:23:22', '2013-06-08 00:16:36', '0', '1');
INSERT INTO `users` VALUES ('7', 'marisa', 'marisa@upm.es', '458ff389547c5068dc72cf9b79ebcebd', '3fa8a0899d6e9398b6d76a3a92ad7016', '2013-05-29 01:43:42', '2013-05-29 05:09:37', '0', '1');
INSERT INTO `users` VALUES ('8', 'rogelio', 'rogelio@upm.es', '8fc52b933532f9a4b83206ea5fd0d6c2', 'b22320196a1b9ae99faf95912023e27c', '2013-06-07 22:36:18', '2013-06-07 22:36:37', '0', '1');
INSERT INTO `users` VALUES ('9', 'clon', 'javiclon@upm.s', '7a1a0ba9d2824e2759661a754139e34b', '9509a18b8addb660117ec6289c31131c', '2013-06-08 01:11:46', '0000-00-00 00:00:00', '0', '1');

-- ----------------------------
-- Procedure structure for test_multi_sets
-- ----------------------------
DROP PROCEDURE IF EXISTS `test_multi_sets`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end
;;
DELIMITER ;
