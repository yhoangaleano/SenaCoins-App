-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModificarEquipo`(IN `d_idEquipo` INT, IN `d_nombreEquipo` VARCHAR(30), IN `d_nombreUsuario` VARCHAR(45), IN `d_contrasena` VARCHAR(45))
    NO SQL
UPDATE equipo SET nombre_equipo = d_nombreEquipo, nombre_usuario = d_nombreUsuario, contrasena = d_contrasena WHERE idEquipo = d_idEquipo