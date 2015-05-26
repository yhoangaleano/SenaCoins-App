-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GuardarEquipo`(IN `d_NombreEquipo` VARCHAR(30), IN `d_NombreUsuario` VARCHAR(45), IN `d_Contrasena` VARCHAR(45))
    NO SQL
INSERT INTO equipo values (null, d_NombreEquipo, d_NombreUsuario, d_Contrasena, 1000, false)